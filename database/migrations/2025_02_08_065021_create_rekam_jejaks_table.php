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
        Schema::create('rekam_jejaks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->uuid('pasien_id');
            $table->integer('lingkar_pinggang');
            $table->integer('trigliserida');
            $table->integer('hdl');
            $table->integer('sistolik');
            $table->integer('diastolik');
            $table->integer('gula');
            $table->boolean('diagnosa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_jejaks');
    }
};
