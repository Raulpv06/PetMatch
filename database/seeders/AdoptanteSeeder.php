<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adoptante;
use Carbon\Carbon;

class AdoptanteSeeder extends Seeder
{
    public function run(): void
    {
        $adoptantes = [
            [
                'nombre' => 'María',
                'apellidoPaterno' => 'López',
                'apellidoMaterno' => 'Hernández',
                'telefono' => '5512345678',
                'correo' => 'maria.lopez@example.com',
                'direccionLinea' => 'Av. Universidad 3000',
                'alcaldia' => 'Coyoacán',
                'codigoPostal' => '04510',
                'fechaRegistro' => Carbon::now()->subDays(20),
            ],
            [
                'nombre' => 'Carlos',
                'apellidoPaterno' => 'Ramírez',
                'apellidoMaterno' => 'Gómez',
                'telefono' => '5523456789',
                'correo' => 'carlos.ramirez@example.com',
                'direccionLinea' => 'Calz. de Tlalpan 1450',
                'alcaldia' => 'Benito Juárez',
                'codigoPostal' => '03300',
                'fechaRegistro' => Carbon::now()->subDays(18),
            ],
            [
                'nombre' => 'Ana Sofía',
                'apellidoPaterno' => 'Martínez',
                'apellidoMaterno' => 'Castillo',
                'telefono' => '5534567890',
                'correo' => 'ana.martinez@example.com',
                'direccionLinea' => 'Calle Sonora 189',
                'alcaldia' => 'Cuauhtémoc',
                'codigoPostal' => '06100',
                'fechaRegistro' => Carbon::now()->subDays(15),
            ],
            [
                'nombre' => 'Jorge',
                'apellidoPaterno' => 'Fernández',
                'apellidoMaterno' => 'Vega',
                'telefono' => '5545678901',
                'correo' => 'jorge.fernandez@example.com',
                'direccionLinea' => 'Av. Revolución 720',
                'alcaldia' => 'Álvaro Obregón',
                'codigoPostal' => '01000',
                'fechaRegistro' => Carbon::now()->subDays(12),
            ],
            [
                'nombre' => 'Valeria',
                'apellidoPaterno' => 'Morales',
                'apellidoMaterno' => 'Reyes',
                'telefono' => '5556789012',
                'correo' => 'valeria.morales@example.com',
                'direccionLinea' => 'Av. Insurgentes Norte 450',
                'alcaldia' => 'Gustavo A. Madero',
                'codigoPostal' => '07300',
                'fechaRegistro' => Carbon::now()->subDays(10),
            ],
            [
                'nombre' => 'Luis Enrique',
                'apellidoPaterno' => 'Torres',
                'apellidoMaterno' => 'Navarro',
                'telefono' => '5567890123',
                'correo' => 'luis.torres@example.com',
                'direccionLinea' => 'Av. Canal de Miramontes 2300',
                'alcaldia' => 'Tlalpan',
                'codigoPostal' => '14390',
                'fechaRegistro' => Carbon::now()->subDays(8),
            ],
            [
                'nombre' => 'Daniela',
                'apellidoPaterno' => 'Cruz',
                'apellidoMaterno' => 'Mendoza',
                'telefono' => '5578901234',
                'correo' => 'daniela.cruz@example.com',
                'direccionLinea' => 'Calle Londres 25',
                'alcaldia' => 'Cuauhtémoc',
                'codigoPostal' => '06600',
                'fechaRegistro' => Carbon::now()->subDays(6),
            ],
            [
                'nombre' => 'Rodrigo',
                'apellidoPaterno' => 'Ortiz',
                'apellidoMaterno' => 'Salazar',
                'telefono' => '5589012345',
                'correo' => 'rodrigo.ortiz@example.com',
                'direccionLinea' => 'Av. Río Churubusco 601',
                'alcaldia' => 'Iztapalapa',
                'codigoPostal' => '09400',
                'fechaRegistro' => Carbon::now()->subDays(4),
            ],
            [
                'nombre' => 'Camila',
                'apellidoPaterno' => 'Vargas',
                'apellidoMaterno' => 'Guerrero',
                'telefono' => '5590123456',
                'correo' => 'camila.vargas@example.com',
                'direccionLinea' => 'Av. División del Norte 1520',
                'alcaldia' => 'Coyoacán',
                'codigoPostal' => '04100',
                'fechaRegistro' => Carbon::now()->subDays(2),
            ],
            [
                'nombre' => 'Fernando',
                'apellidoPaterno' => 'Ríos',
                'apellidoMaterno' => 'Pacheco',
                'telefono' => '5501234567',
                'correo' => 'fernando.rios@example.com',
                'direccionLinea' => 'Calle Romero de Terreros 412',
                'alcaldia' => 'Benito Juárez',
                'codigoPostal' => '03100',
                'fechaRegistro' => Carbon::now(),
            ],
        ];

        foreach ($adoptantes as $data) {
            Adoptante::updateOrCreate(['correo' => $data['correo']], $data);
        }
    }
}