<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Raza;
use App\Models\Especie;

class RazaSeeder extends Seeder
{
    public function run(): void
    {
        $canino = Especie::where('nombreEspecie', 'Canino')->first();
        $felino = Especie::where('nombreEspecie', 'Felino')->first();

        if ($canino) {
            Raza::create(['idEspecie' => $canino->idEspecie, 'nombreRaza' => 'Labrador']);
            Raza::create(['idEspecie' => $canino->idEspecie, 'nombreRaza' => 'Golden Retriever']);
        }

        if ($felino) {
            Raza::create(['idEspecie' => $felino->idEspecie, 'nombreRaza' => 'Siamés']);
            Raza::create(['idEspecie' => $felino->idEspecie, 'nombreRaza' => 'Persa']);
        }
    }
}
