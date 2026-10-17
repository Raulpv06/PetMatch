<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ROL')->insert([
            ['idRol' => 1, 'nombreRol' => 'Administrador', 'created_at' => now(), 'updated_at' => now()],
            ['idRol' => 2, 'nombreRol' => 'Personal Operativo', 'created_at' => now(), 'updated_at' => now()],
            ['idRol' => 3, 'nombreRol' => 'Veterinario', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
