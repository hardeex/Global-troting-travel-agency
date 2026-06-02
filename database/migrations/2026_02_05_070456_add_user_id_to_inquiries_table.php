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
        Schema::table('inquiries', function (Blueprint $table) {
            // Add user_id to link inquiries to registered users (nullable for guest inquiries)
            $table->unsignedBigInteger('user_id')->nullable()->after('user_agent');
            
            // Foreign key constraint
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null'); // Keep inquiry even if user is deleted
            
            // Indexes for faster queries
            $table->index('user_id');
            $table->index(['email', 'created_at']); // For guest user lookups by email
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropIndex(['user_id']);
            $table->dropIndex(['email', 'created_at']);
            $table->dropColumn('user_id');
        });
    }
};