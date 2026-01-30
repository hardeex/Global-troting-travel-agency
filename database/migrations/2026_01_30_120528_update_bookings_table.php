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
    Schema::table('bookings', function (Blueprint $table) {

        if (!Schema::hasColumn('bookings', 'address')) {
            $table->string('address', 200)->nullable();
        }

        if (!Schema::hasColumn('bookings', 'flexible_dates')) {
            $table->string('flexible_dates', 10)->nullable();
        }

        if (!Schema::hasColumn('bookings', 'insurance')) {
            $table->string('insurance', 10)->nullable(); // yes / no
        }

        if (!Schema::hasColumn('bookings', 'services')) {
            $table->json('services')->nullable();
        }

        if (!Schema::hasColumn('bookings', 'marketing_consent')) {
            $table->boolean('marketing_consent')->default(false);
        }

        // Security & Spam Prevention
        if (!Schema::hasColumn('bookings', 'ip_address')) {
            $table->string('ip_address', 45)->nullable();
        }

        if (!Schema::hasColumn('bookings', 'user_agent')) {
            $table->text('user_agent')->nullable();
        }

        if (!Schema::hasColumn('bookings', 'is_spam')) {
            $table->boolean('is_spam')->default(false);
        }
    });

    // Indexes (outside to avoid redefinition issues)
    Schema::table('bookings', function (Blueprint $table) {

        if (Schema::hasColumn('bookings', 'email')) {
            $table->index('email');
        }

        if (Schema::hasColumn('bookings', 'is_spam')) {
            $table->index('is_spam');
        }

        if (Schema::hasColumn('bookings', 'created_at')) {
            $table->index('created_at');
        }

        if (
            Schema::hasColumn('bookings', 'departure_date') &&
            Schema::hasColumn('bookings', 'return_date')
        ) {
            $table->index(['departure_date', 'return_date']);
        }
    });
}

    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::table('bookings', function (Blueprint $table) {

        // Drop indexes safely
        if (Schema::hasColumn('bookings', 'email')) {
            $table->dropIndex(['email']);
        }

        if (Schema::hasColumn('bookings', 'is_spam')) {
            $table->dropIndex(['is_spam']);
        }

        if (Schema::hasColumn('bookings', 'created_at')) {
            $table->dropIndex(['created_at']);
        }

        if (
            Schema::hasColumn('bookings', 'departure_date') &&
            Schema::hasColumn('bookings', 'return_date')
        ) {
            $table->dropIndex(['departure_date', 'return_date']);
        }

        // Drop columns safely
        if (Schema::hasColumn('bookings', 'address')) {
            $table->dropColumn('address');
        }

        if (Schema::hasColumn('bookings', 'flexible_dates')) {
            $table->dropColumn('flexible_dates');
        }

        if (Schema::hasColumn('bookings', 'insurance')) {
            $table->dropColumn('insurance');
        }

        if (Schema::hasColumn('bookings', 'services')) {
            $table->dropColumn('services');
        }

        if (Schema::hasColumn('bookings', 'marketing_consent')) {
            $table->dropColumn('marketing_consent');
        }

        if (Schema::hasColumn('bookings', 'ip_address')) {
            $table->dropColumn('ip_address');
        }

        if (Schema::hasColumn('bookings', 'user_agent')) {
            $table->dropColumn('user_agent');
        }

        if (Schema::hasColumn('bookings', 'is_spam')) {
            $table->dropColumn('is_spam');
        }
    });
}

};
