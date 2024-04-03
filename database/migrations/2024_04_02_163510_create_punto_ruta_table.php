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
        // Schema::disableForeignKeyConstraints();
        Schema::create('punto_ruta', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('punto_id');
            $table->unsignedBigInteger('ruta_id');
            $table->char('estado', 1)->nullable(true);

            $table->foreign('punto_id')->references('id')->on('puntos')->onDelete('cascade');
            $table->foreign('ruta_id')->references('id')->on('rutas')->onDelete('cascade');

            $table->timestamps();
        });
        // Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('punto_ruta');
    }
};
