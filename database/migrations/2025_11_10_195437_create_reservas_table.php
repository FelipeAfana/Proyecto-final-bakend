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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha');
            $table->dateTime('Hora_entrada');
            $table->integer('Cantidad');
            $table->string('Estado', 255);


            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('entrada_id')->constrained('entradas')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
