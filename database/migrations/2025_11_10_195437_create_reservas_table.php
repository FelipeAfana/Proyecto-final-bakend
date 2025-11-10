<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id(); // Clave primaria: id
            $table->date('Fecha');
            $table->dateTime('Hora_entrada');
            $table->integer('Cantidad'); // La cantidad de reservas, no la cantidad de personas
            $table->string('Estado', 255);

            // **CLAVES FORÁNEAS (RELACIONES)**
            // Asumiendo que la tabla 'users' existe y tiene 'id' como PK
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->foreignId('entrada_id')->constrained('entradas')->onDelete('cascade');
            // La relación con Atracciones es 1:N y parece opcional
            $table->foreignId('atraccion_id')->nullable()->constrained('atracciones')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
