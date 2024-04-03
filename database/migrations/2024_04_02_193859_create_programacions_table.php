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
        Schema::create('programacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehiculo_id')->nullable(false);
            $table->unsignedBigInteger('ruta_id')->nullable(false);
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->foreign('ruta_id')->references('id')->on('rutas');
            $table->time('fecha_i')->nullable(false);
            $table->time('fecha_f')->nullable(false);
            $table->char('estado', 1)->nullable(true);
            $table->text('observacion')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programacions');
    }
};
