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
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuadre_id');
            $table->unsignedBigInteger('programacion_id');
            $table->foreign('cuadre_id')->references('id')->on('cuadres');
            $table->foreign('programacion_id')->references('id')->on('programacions');
            $table->string('tula')->nullable(false);
            $table->string('candado')->nullable(false);
            $table->integer('cantidad_paquetes');
            $table->string('asesora_entrega')->nullable(false);;
            $table->string('guarda_Recibe')->nullable(false);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
