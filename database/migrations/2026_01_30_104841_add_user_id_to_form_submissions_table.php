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
        if (!Schema::hasColumn('form_submissions', 'user_id')) {
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
        }

        if (!Schema::hasColumn('form_submissions', 'email')) {
            $table->string('email', 150)
                ->nullable()
                ->index();
        }

        // Only add composite if it doesn't exist (Laravel 9+)
        $indexName = 'form_submissions_user_id_created_at_index';
        if (!Schema::hasIndex('form_submissions', $indexName)) {
            $table->index(['user_id', 'created_at'], $indexName);
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('form_submissions', function (Blueprint $table) {
            // Drop composite index first
            $table->dropIndex('form_submissions_user_id_created_at_index');

            // Drop email index + column
            $table->dropColumn('email');

            // Drop foreign key + column
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};