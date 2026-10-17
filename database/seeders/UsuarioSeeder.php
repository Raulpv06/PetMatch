<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('USUARIO')->insert([
            [
                'idUsuario' => 1,
                'idRol' => 1,
                'nombre' => 'José Raúl',
                'apellidoPaterno' => 'Pizaña',
                'apellidoMaterno' => 'Valdés',
                'correo' => 'raul@petmatch.local',
                'contraseña' => Hash::make('password123'),
                'activo' => true,
                'fechaCreacion' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUsuario' => 2,
                'idRol' => 2,
                'nombre' => 'Jeshyd',
                'apellidoPaterno' => 'Medina',
                'apellidoMaterno' => 'Álvarez',
                'correo' => 'jeshyd@petmatch.local',
                'contraseña' => Hash::make('password123'),
                'activo' => true,
                'fechaCreacion' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}