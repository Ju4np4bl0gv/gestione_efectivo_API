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
        Schema::create('premios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuadre_id');
            $table->foreign('cuadre_id')->references('id')->on('cuadres');
            $table->float('valor')->nullable(false);
            $table->string('archivo')->nullable(false);
            $table->string('formulario')->nullable(false);
            $table->char('serie',3)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premios');
    }
};
