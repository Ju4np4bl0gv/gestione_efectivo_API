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
        Schema::create('imagenfrms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('premio_id');
            $table->foreign('premio_id')->references('id')->on('premios');
            $table->string('imagen')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenfrms');
    }
};
