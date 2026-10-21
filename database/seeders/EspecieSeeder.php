<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especie;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Especie::create(['nombreEspecie' => 'Canino']);
        Especie::create(['nombreEspecie' => 'Felino']);
    }
}
