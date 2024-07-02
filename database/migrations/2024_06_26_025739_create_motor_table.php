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
        Schema::create('motor', function (Blueprint $table) {
            $table->id();
            $table->string('blotterno');
            $table->string('region');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('street');
            $table->date('date_time_missing');
            $table->string('owner');
            $table->string('type');
            $table->string('make');
            $table->string('model');
            $table->string('color');
            $table->string('mvfile_number');
            $table->string('plate_number');
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->text('status');
            $table->string('remarks');
            $table->string('station');
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motor');
    }
};
