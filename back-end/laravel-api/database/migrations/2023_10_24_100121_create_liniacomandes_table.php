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
        Schema::create('liniacomandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_comanda');
            $table->integer('id_producte');
            $table->string('nom_producte');
            $table->string('desc_producte');
            $table->binary('imatge_producte')->nullable()->default(null);
            $table->integer('quantitat');
            $table->integer('preu');
            $table->timestamps();
            $table->foreign('id_comanda')->references('id')->on('comandes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liniacomandes');
    }
};
