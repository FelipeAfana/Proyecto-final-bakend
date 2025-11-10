<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtraccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('atracciones')->insert([
            'id' => 1,
            'Nombre' => 'Formula Rosca',
            'Descripción' => 'Sumérgete en la adrenalina pura de la Formula Rosca...',
            'Altura_min' => 145, // cm
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Añadir más atracciones si es necesario
    }
}
