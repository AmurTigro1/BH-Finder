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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('image', 255)->nullable();
            $table->string('type')->nullable();
            $table->string('wifi')->default('yes')->nullable();
            $table->string('description')->nullable();
            $table->integer('occupancy')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            // $table->foreignId('boarding_house_id')->constrained()->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
