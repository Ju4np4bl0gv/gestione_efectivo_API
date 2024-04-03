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
        Schema::create('guarda_programacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guarda_id')->nullable(false);
            $table->unsignedBigInteger('programacion_id')->nullable(false);
            $table->unsignedBigInteger('rolgd_id')->nullable(false);
            $table->foreign('guarda_id')->references('id')->on('guardas');
            $table->foreign('programacion_id')->references('id')->on('programacions');
            $table->foreign('rolgd_id')->references('id')->on('rolgds');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guarda_programacion');
    }
};
