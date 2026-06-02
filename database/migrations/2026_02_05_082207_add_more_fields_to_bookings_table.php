<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add columns
        Schema::table('bookings', function (Blueprint $table) {
            // User relationship
            if (!Schema::hasColumn('bookings', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
            }
            
            // Travel insurance
            if (!Schema::hasColumn('bookings', 'insurance')) {
                $table->enum('insurance', ['yes', 'no'])->nullable()->after('budget');
            }
            
            // Flexible dates
            if (!Schema::hasColumn('bookings', 'flexible_dates')) {
                $table->enum('flexible_dates', ['yes', 'no'])->nullable()->after('return_date');
            }
            
            // Marketing consent
            if (!Schema::hasColumn('bookings', 'marketing_consent')) {
                $table->boolean('marketing_consent')->default(false)->after('special_requests');
            }
            
            // IP address
            if (!Schema::hasColumn('bookings', 'ip_address')) {
                $table->ipAddress('ip_address')->nullable()->after('marketing_consent');
            }
            
            // User agent
            if (!Schema::hasColumn('bookings', 'user_agent')) {
                $table->text('user_agent')->nullable()->after('ip_address');
            }
        });

        // Add foreign key separately
        $foreignKeys = $this->getForeignKeys('bookings');
        if (!in_array('bookings_user_id_foreign', $foreignKeys)) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('set null');
            });
        }

        // Add indexes separately
        $indexes = $this->getIndexes('bookings');
        
        if (!in_array('bookings_user_id_index', $indexes)) {
            DB::statement('ALTER TABLE bookings ADD INDEX bookings_user_id_index (user_id)');
        }
        
        if (!in_array('bookings_email_created_at_index', $indexes)) {
            DB::statement('ALTER TABLE bookings ADD INDEX bookings_email_created_at_index (email, created_at)');
        }
        
        if (!in_array('bookings_departure_date_index', $indexes)) {
            DB::statement('ALTER TABLE bookings ADD INDEX bookings_departure_date_index (departure_date)');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key
        $foreignKeys = $this->getForeignKeys('bookings');
        if (in_array('bookings_user_id_foreign', $foreignKeys)) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
        }

        // Drop indexes
        $indexes = $this->getIndexes('bookings');
        
        if (in_array('bookings_user_id_index', $indexes)) {
            DB::statement('DROP INDEX bookings_user_id_index ON bookings');
        }
        
        if (in_array('bookings_email_created_at_index', $indexes)) {
            DB::statement('DROP INDEX bookings_email_created_at_index ON bookings');
        }
        
        if (in_array('bookings_departure_date_index', $indexes)) {
            DB::statement('DROP INDEX bookings_departure_date_index ON bookings');
        }

        // Drop columns
        Schema::table('bookings', function (Blueprint $table) {
            $columnsToDrop = [];
            
            if (Schema::hasColumn('bookings', 'user_id')) $columnsToDrop[] = 'user_id';
            if (Schema::hasColumn('bookings', 'insurance')) $columnsToDrop[] = 'insurance';
            if (Schema::hasColumn('bookings', 'flexible_dates')) $columnsToDrop[] = 'flexible_dates';
            if (Schema::hasColumn('bookings', 'marketing_consent')) $columnsToDrop[] = 'marketing_consent';
            if (Schema::hasColumn('bookings', 'ip_address')) $columnsToDrop[] = 'ip_address';
            if (Schema::hasColumn('bookings', 'user_agent')) $columnsToDrop[] = 'user_agent';
            
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }

    /**
     * Get existing indexes for a table
     */
    private function getIndexes(string $table): array
    {
        $indexes = DB::select("SHOW INDEX FROM `{$table}`");
        return array_unique(array_column($indexes, 'Key_name'));
    }

    /**
     * Get existing foreign keys for a table
     */
    private function getForeignKeys(string $table): array
    {
        $databaseName = DB::getDatabaseName();
        
        $foreignKeys = DB::select("
            SELECT CONSTRAINT_NAME 
            FROM INFORMATION_SCHEMA.TABLE_CONSTRAINTS 
            WHERE TABLE_SCHEMA = ? 
            AND TABLE_NAME = ? 
            AND CONSTRAINT_TYPE = 'FOREIGN KEY'
        ", [$databaseName, $table]);
        
        return array_column($foreignKeys, 'CONSTRAINT_NAME');
    }
};