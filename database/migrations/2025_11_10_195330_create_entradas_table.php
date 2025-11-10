<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id(); // Clave primaria: id
            $table->integer('Precio');

            // **CLAVES FORÁNEAS (RELACIONES)**
            $table->foreignId('cantidad_id')->constrained('cantidades')->onDelete('restrict');
            $table->foreignId('plan_id')->constrained('plan')->onDelete('restrict');
            // La relación con Atracciones es 1:N y parece opcional en tu diagrama
            $table->foreignId('atraccion_id')->nullable()->constrained('atracciones')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
