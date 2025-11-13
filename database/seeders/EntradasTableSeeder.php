<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EntradasTableSeeder extends Seeder
{
    /**
     * Ejecuta las semillas de la base de datos.
     */
    public function run(): void
    {
        // 1. Desactivar y limpiar
        Schema::disableForeignKeyConstraints();
        DB::table('entradas')->truncate();

        // 2. Definir Constantes
        $planGeneralId = 1;
        $planFastPassId = 2;
        $cantidadId = 1;

        // **PRECIOS REQUERIDOS POR EL CONTROLADOR**
        $precioGeneral = 45000;
        $precioFastPass = 75000;

        // Lista de Atracciones que necesitan tickets
        // Basado en el seeder anterior (ID 1, 2, 3, 4), asumiendo que Rueda es la ID 2.
        $atraccionIds = [1, 2, 3, 4];

        $entradas = [];

        // 3. Generar entradas para cada atracción con los precios unificados
        foreach ($atraccionIds as $atraccionId) {
            // Entrada General (45000)
            $entradas[] = [
                'Precio' => $precioGeneral,
                'atraccion_id' => $atraccionId,
                'plan_id' => $planGeneralId,
                'cantidad_id' => $cantidadId,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Entrada Fast Pass (75000)
            $entradas[] = [
                'Precio' => $precioFastPass,
                'atraccion_id' => $atraccionId,
                'plan_id' => $planFastPassId,
                'cantidad_id' => $cantidadId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // 4. Insertar y Reactivar
        DB::table('entradas')->insert($entradas);
        Schema::enableForeignKeyConstraints();
    }
}
