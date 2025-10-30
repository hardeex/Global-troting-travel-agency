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
            $table->string('full_name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('nationality')->nullable()->change();
            $table->string('destination')->nullable()->change();
            $table->string('trip_type')->nullable()->change();
            $table->date('departure_date')->nullable()->change();
            $table->date('return_date')->nullable()->change();
            $table->unsignedInteger('adults')->nullable()->change();
            $table->unsignedInteger('children')->nullable()->change();
            $table->unsignedInteger('infants')->nullable()->change();
            $table->string('accommodation')->nullable()->change();
            $table->string('budget')->nullable()->change();
            $table->json('services')->nullable()->change();
            $table->text('special_requests')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('full_name')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->string('nationality')->nullable(false)->change();
            $table->string('destination')->nullable(false)->change();
            $table->string('trip_type')->nullable(false)->change();
            $table->date('departure_date')->nullable(false)->change();
            $table->date('return_date')->nullable(false)->change();
            $table->unsignedInteger('adults')->nullable(false)->change();
            $table->unsignedInteger('children')->nullable()->change();
            $table->unsignedInteger('infants')->nullable()->change();
            $table->string('accommodation')->nullable(false)->change();
            $table->string('budget')->nullable(false)->change();
            $table->json('services')->nullable()->change();
            $table->text('special_requests')->nullable()->change();
        });
    }
};
