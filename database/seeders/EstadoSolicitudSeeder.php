<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSolicitudSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ESTADO_SOLICITUD')->insert([
            ['idEstadoSolicitud' => 1, 'nombreEstado' => 'En revisión', 'created_at' => now(), 'updated_at' => now()],
            ['idEstadoSolicitud' => 2, 'nombreEstado' => 'Aprobada', 'created_at' => now(), 'updated_at' => now()],
            ['idEstadoSolicitud' => 3, 'nombreEstado' => 'Rechazada', 'created_at' => now(), 'updated_at' => now()],
            ['idEstadoSolicitud' => 4, 'nombreEstado' => 'Cancelada', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
