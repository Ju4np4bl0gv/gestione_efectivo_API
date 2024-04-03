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
            $table->float('premio');
            $table->float('total_b');
            $table->float('total_m');
            $table->float('m50');
            $table->float('m100');
            $table->float('m200');
            $table->float('m500');
            $table->float('m1000');
            $table->float('b1000');
            $table->float('b2000');
            $table->float('b5000');
            $table->float('b10000');
            $table->float('b20000');
            $table->float('b50000');
            $table->float('b100000');
            $table->float('total_bnet');
            $table->float('total_siis');
            $table->text('observacion');
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
