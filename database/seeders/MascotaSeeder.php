<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mascota;
use App\Models\Raza;
use App\Models\EstadoMascota;
use App\Models\Usuario;
use Carbon\Carbon;

class MascotaSeeder extends Seeder
{
    public function run(): void
    {
        $raza = Raza::first();
        $estado = EstadoMascota::first();
        $usuario = Usuario::first(); 

        if ($raza && $estado && $usuario) {
            Mascota::create([
                'idRaza' => $raza->idRaza,
                'idEstadoMascota' => $estado->idEstadoMascota,
                'idUsuario' => $usuario->idUsuario,
                'nombre' => 'Firulais',
                'edadEstimadaMeses' => 12,
                'sexo' => 'M',
                'tamanio' => 'Mediano',
                'descripcionFisica' => 'Perro amigable color café claro con manchas blancas.',
                'fechaIngreso' => Carbon::now(),
            ]);
        }
    }
}
