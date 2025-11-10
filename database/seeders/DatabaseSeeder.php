<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Las tablas de referencia deben ir primero
            PlanTableSeeder::class,
            CantidadesTableSeeder::class,

            // Las tablas que dependen de ellas van después
            AtraccionesTableSeeder::class,
            EntradasTableSeeder::class,
        ]);
    }
}
