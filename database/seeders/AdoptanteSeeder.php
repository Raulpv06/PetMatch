<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adoptante;
use Carbon\Carbon;

class AdoptanteSeeder extends Seeder
{
    public function run(): void
    {
        Adoptante::create([
            'nombre' => 'María',
            'apellidoPaterno' => 'López',
            'apellidoMaterno' => 'Hernández',
            'telefono' => '5512345678',
            'correo' => 'maria.lopez@example.com',
            'direccionLinea' => 'Av. Universidad 3000',
            'alcaldia' => 'Coyoacán',
            'codigoPostal' => '04510',
            'fechaRegistro' => Carbon::now(),
        ]);
    }
}
