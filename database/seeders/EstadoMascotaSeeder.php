<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EstadoMascota;

class EstadoMascotaSeeder extends Seeder
{
    public function run(): void
    {
        EstadoMascota::create(['nombreEstado' => 'Disponible']);
        EstadoMascota::create(['nombreEstado' => 'En proceso de adopción']);
        EstadoMascota::create(['nombreEstado' => 'Adoptado']);
    }
}
