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
        Schema::create('destinations', function (Blueprint $table) {
             $table->id();
            $table->decimal('price', 10, 2);
            $table->string('country');
            $table->string('title');
            $table->string('short_description', 255);
            $table->text('details')->nullable();
            $table->string('image_url'); 
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('adults')->nullable();
            $table->integer('nights')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
