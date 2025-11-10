<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanTableSeeder extends Seeder
{
    public function run(): void
    {
        // Inserta un registro inicial
        DB::table('plan')->insert([
            'id' => 1,
            'Solitario' => 1,
            'Familiar' => 0,
            'Amigos' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
