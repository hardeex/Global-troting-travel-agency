<?php

namespace App\Console\Commands;

use App\Models\Destination;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateDestinationSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'destinations:generate-slugs {--force : Force regenerate all slugs even if they exist}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate unique slugs for all destinations that don\'t have one';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $force = $this->option('force');
        
        $this->info('Starting slug generation for destinations...');
        $this->newLine();

        // Get destinations without slugs or all if force is enabled
        $query = Destination::query();
        
        if (!$force) {
            $query->whereNull('slug')->orWhere('slug', '');
        }
        
        $destinations = $query->get();
        
        if ($destinations->isEmpty()) {
            $this->info('✓ No destinations need slug generation.');
            return Command::SUCCESS;
        }

        $this->info("Found {$destinations->count()} destination(s) to process.");
        $this->newLine();

        $bar = $this->output->createProgressBar($destinations->count());
        $bar->start();

        $successCount = 0;
        $errorCount = 0;
        $errors = [];

        foreach ($destinations as $destination) {
            try {
                // Generate unique slug
                $slug = Destination::generateUniqueSlug($destination->title, $destination->id);
                
                // Update without triggering model events
                $destination->timestamps = false;
                $destination->slug = $slug;
                $destination->save();
                $destination->timestamps = true;
                
                $successCount++;
                
            } catch (\Exception $e) {
                $errorCount++;
                $errors[] = [
                    'id' => $destination->id,
                    'title' => $destination->title,
                    'error' => $e->getMessage(),
                ];
            }
            
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        // Display results
        if ($successCount > 0) {
            $this->info("✓ Successfully generated {$successCount} slug(s).");
        }

        if ($errorCount > 0) {
            $this->error("✗ Failed to generate {$errorCount} slug(s):");
            $this->newLine();
            
            foreach ($errors as $error) {
                $this->line("  - ID {$error['id']}: {$error['title']}");
                $this->line("    Error: {$error['error']}");
            }
        }

        $this->newLine();
        
        // Show some examples
        $this->info('Sample generated slugs:');
        Destination::whereNotNull('slug')
            ->latest()
            ->take(5)
            ->get()
            ->each(function ($destination) {
                $this->line("  • {$destination->title} → {$destination->slug}");
            });

        return Command::SUCCESS;
    }
}