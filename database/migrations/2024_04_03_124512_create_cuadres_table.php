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
        Schema::create('cuadres', function (Blueprint $table) {
            $table->id();
            $table->string('asesora_doc')->nullable(false);
            $table->integer('punto_cod')->nullable(false);
            $table->char('turno', 2)->nullable(false);
            $table->float('premio')->nullable(true);
            $table->float('total_b')->nullable(true);
            $table->float('total_m')->nullable(true);
            $table->integer('m50')->nullable(true);
            $table->integer('m100')->nullable(true);
            $table->integer('m200')->nullable(true);
            $table->integer('m500')->nullable(true);
            $table->integer('m1000')->nullable(true);
            $table->integer('b1000')->nullable(true);
            $table->integer('b2000')->nullable(true);
            $table->integer('b5000')->nullable(true);
            $table->integer('b10000')->nullable(true);
            $table->integer('b20000')->nullable(true);
            $table->integer('b50000')->nullable(true);
            $table->integer('b100000')->nullable(true);
            $table->float('total_bnet')->nullable(true);
            $table->float('total_siis')->nullable(true);
            $table->text('observacion')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuadres');
    }
};
