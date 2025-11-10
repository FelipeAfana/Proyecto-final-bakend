<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CantidadesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cantidades')->insert([
            'id' => 1,
            'Adulto' => 1,
            'Niño' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
