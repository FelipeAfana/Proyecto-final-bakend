<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntradasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planId = 1;
        $cantidadId = 1;

        // Entradas para la Atracción ID 1 (Formula Rosca)
        DB::table('entradas')->insert([
            // Entrada General para Atracción 1
            [
                'Precio' => 45000,
                'atraccion_id' => 1,
                'plan_id' => $planId,
                'cantidad_id' => $cantidadId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Fast Pass para Atracción 1
            [
                'Precio' => 75000,
                'atraccion_id' => 1,
                'plan_id' => $planId,
                'cantidad_id' => $cantidadId,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
