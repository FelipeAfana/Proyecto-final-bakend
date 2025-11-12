<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // Importación necesaria para deshabilitar FK

class AtraccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. DESACTIVAR las comprobaciones de claves foráneas
        // Esto es necesario para poder usar truncate() en tablas con relaciones.
        Schema::disableForeignKeyConstraints();

        // Limpiamos la tabla antes de insertar para evitar duplicados en cada ejecución
        DB::table('atracciones')->truncate();

        DB::table('atracciones')->insert([
            [
                'id' => 1,
                'Nombre' => 'Formula Rosca',
                'Descripción' => 'Sumérgete en la adrenalina pura de la Formula Rosca. Una montaña rusa con giros 360 y caídas vertiginosas que pondrán a prueba tu valor. ¡Prepárate para la máxima velocidad!',
                'Altura_min' => 145, // cm
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'Nombre' => 'La Gran Rueda',
                'Descripción' => 'Disfruta de la mejor vista panorámica de la ciudad desde la cima de nuestra icónica Gran Rueda. Perfecta para un paseo tranquilo y capturar fotos impresionantes al atardecer.',
                'Altura_min' => 100, // cm
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'Nombre' => 'El Barco',
                'Descripción' => '¡Sube a bordo y siente la bravura del mar! El Barco Pirata se balancea cada vez más alto, dándote una sensación de ingravidez en su punto máximo.',
                'Altura_min' => 120, // cm
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'Nombre' => 'Carros Chocones',
                'Descripción' => 'La clásica diversión donde las reglas son simples: ¡chocar! Ponte al volante y disfruta de un momento de risas y colisiones controladas con tus amigos y familiares.',
                'Altura_min' => 110, // cm
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2. VOLVER A ACTIVAR las comprobaciones de claves foráneas
        Schema::enableForeignKeyConstraints();
    }
}
