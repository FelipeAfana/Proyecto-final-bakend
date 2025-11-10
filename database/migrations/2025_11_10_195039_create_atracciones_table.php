<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atracciones', function (Blueprint $table) {
            $table->id(); // Clave primaria: id
            $table->string('Nombre', 255);
            $table->text('Descripción')->nullable();
            $table->integer('Altura_min')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atracciones');
    }
};
