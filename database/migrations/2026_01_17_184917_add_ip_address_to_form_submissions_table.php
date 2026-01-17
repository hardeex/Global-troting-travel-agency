<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('form_submissions', function (Blueprint $table) {
            $table->string('ip_address', 45)->nullable()->after('payload');
            $table->text('user_agent')->nullable()->after('ip_address');
            $table->boolean('is_spam')->default(false)->after('user_agent');
            
            // Add indexes for better query performance
            $table->index('ip_address');
            $table->index('is_spam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('form_submissions', function (Blueprint $table) {
            $table->dropIndex(['ip_address']);
            $table->dropIndex(['is_spam']);
            $table->dropColumn(['ip_address', 'user_agent', 'is_spam']);
        });
    }
};