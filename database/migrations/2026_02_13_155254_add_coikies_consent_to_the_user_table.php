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
        Schema::table('users', function (Blueprint $table) {
            $table->string('cookie_consent')->nullable()->after('remember_token');
            $table->json('cookie_settings')->nullable()->after('cookie_consent');
            $table->timestamp('cookie_consent_date')->nullable()->after('cookie_settings');
        });

        // Optional: Create a separate consent log table for audit trail
        Schema::create('cookie_consent_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('ip_address');
            $table->text('user_agent');
            $table->string('consent_type'); // accepted, rejected, custom
            $table->json('settings');
            $table->timestamps();
            
            $table->index(['user_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cookie_consent', 'cookie_settings', 'cookie_consent_date']);
        });

        Schema::dropIfExists('cookie_consent_logs');
    }
};