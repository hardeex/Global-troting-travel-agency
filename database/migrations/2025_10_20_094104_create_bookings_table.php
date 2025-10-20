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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('nationality');
            $table->string('destination');
            $table->string('trip_type');
            $table->date('departure_date');
            $table->date('return_date');
            $table->unsignedInteger('adults');
            $table->unsignedInteger('children')->nullable();
            $table->unsignedInteger('infants')->nullable();
            $table->string('accommodation');
            $table->string('budget');
            $table->json('services')->nullable();
            $table->text('special_requests')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
