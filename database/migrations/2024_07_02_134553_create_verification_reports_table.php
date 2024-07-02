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
        Schema::create('verification_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('verified_by_id');
            $table->string('search_input');
            $table->datetime('date_time_verified');
            $table->string('status');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_reports');
    }
};
