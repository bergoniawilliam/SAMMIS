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
        Schema::create('reported_motorcycles', function (Blueprint $table) {
            $table->id();
            $table->string('blotterno');
            $table->string('plate_number');
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->string('mvfile_number');
            $table->string('region');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('street');
            $table->datetime('date_time_missing');
            $table->foreignId('motorcycle_reporters_id')->constrained();
            $table->foreignId('reported_motorcycle_owners_id')->constrained();
            $table->string('type');
            $table->string('make');
            $table->string('model');
            $table->string('color');
            $table->foreignId('station_id')->constrained();
            $table->foreignId('created_by_id')->constrained('users');
            $table->foreignId('updated_by_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reported_motorcycles');
    }
};