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
        Schema::create('comandes', function (Blueprint $table) {
            $table->id(); 
            $table->enum('estat',['rebut','en preparacio','llest per recollir'])->default('rebut');
            $table->float('total');      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comandes');
    }
};
