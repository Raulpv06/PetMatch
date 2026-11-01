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
        $estado = EstadoMascota::where('nombreEstado', 'Disponible')->first() ?? EstadoMascota::first();
        $usuario = Usuario::first();

        // Mapear razas existentes
        $labrador = Raza::where('nombreRaza', 'Labrador')->first();
        $golden   = Raza::where('nombreRaza', 'Golden Retriever')->first();
        $siames   = Raza::where('nombreRaza', 'Siamés')->first();
        $persa    = Raza::where('nombreRaza', 'Persa')->first();

        $defaultRaza = $labrador ?? Raza::first();

        if (!$estado || !$defaultRaza || !$usuario) {
            return;
        }

        $mascotas = [
            [
                'nombre' => 'Firulais',
                'idRaza' => $labrador?->idRaza ?? $defaultRaza->idRaza,
                'edadEstimadaMeses' => 12,
                'sexo' => 'M',
                'tamanio' => 'Mediano',
                'descripcionFisica' => 'Perro amigable color café claro con manchas blancas.',
                'fechaIngreso' => Carbon::now()->subMonths(3),
            ],
            [
                'nombre' => 'Luna',
                'idRaza' => $golden?->idRaza ?? $defaultRaza->idRaza,
                'edadEstimadaMeses' => 8,
                'sexo' => 'H',
                'tamanio' => 'Chico',
                'descripcionFisica' => 'Cachorra de pelaje dorado claro y ojos almendrados.',
                'fechaIngreso' => Carbon::now()->subMonths(2),
            ],
            [
                'nombre' => 'Rocky',
                'idRaza' => $labrador?->idRaza ?? $defaultRaza->idRaza,
                'edadEstimadaMeses' => 24,
                'sexo' => 'M',
                'tamanio' => 'Grande',
                'descripcionFisica' => 'Perro fuerte y dócil color chocolate.',
                'fechaIngreso' => Carbon::now()->subMonths(4),
            ],
            [
                'nombre' => 'Mía',
                'idRaza' => $siames?->idRaza ?? $defaultRaza->idRaza, // Felino - Siamés
                'edadEstimadaMeses' => 6,
                'sexo' => 'H',
                'tamanio' => 'Chico',
                'descripcionFisica' => 'Gatita siamesa con orejas oscuras y ojos celestes.',
                'fechaIngreso' => Carbon::now()->subMonths(1),
            ],
            [
                'nombre' => 'Max',
                'idRaza' => $golden?->idRaza ?? $defaultRaza->idRaza,
                'edadEstimadaMeses' => 36,
                'sexo' => 'M',
                'tamanio' => 'Grande',
                'descripcionFisica' => 'Perro sociable y protector de pelaje denso.',
                'fechaIngreso' => Carbon::now()->subMonths(5),
            ],
            [
                'nombre' => 'Bella',
                'idRaza' => $labrador?->idRaza ?? $defaultRaza->idRaza,
                'edadEstimadaMeses' => 14,
                'sexo' => 'H',
                'tamanio' => 'Mediano',
                'descripcionFisica' => 'Perrita color miel de orejas caídas y carácter tranquilo.',
                'fechaIngreso' => Carbon::now()->subWeeks(3),
            ],
            [
                'nombre' => 'Simba',
                'idRaza' => $persa?->idRaza ?? $defaultRaza->idRaza, // Felino - Persa
                'edadEstimadaMeses' => 10,
                'sexo' => 'M',
                'tamanio' => 'Chico',
                'descripcionFisica' => 'Gato persa color crema con pelaje esponjoso.',
                'fechaIngreso' => Carbon::now()->subWeeks(2),
            ],
            [
                'nombre' => 'Coco',
                'idRaza' => $siames?->idRaza ?? $defaultRaza->idRaza, // Felino - Siamés
                'edadEstimadaMeses' => 18,
                'sexo' => 'M',
                'tamanio' => 'Chico',
                'descripcionFisica' => 'Gato siamés ágil, juguetón y cariñoso.',
                'fechaIngreso' => Carbon::now()->subMonths(2),
            ],
            [
                'nombre' => 'Nala',
                'idRaza' => $persa?->idRaza ?? $defaultRaza->idRaza, // Felino - Persa
                'edadEstimadaMeses' => 16,
                'sexo' => 'H',
                'tamanio' => 'Mediano',
                'descripcionFisica' => 'Gata persa blanca de ojos verdes, muy tranquila.',
                'fechaIngreso' => Carbon::now()->subWeeks(4),
            ],
            [
                'nombre' => 'Toby',
                'idRaza' => $labrador?->idRaza ?? $defaultRaza->idRaza,
                'edadEstimadaMeses' => 30,
                'sexo' => 'M',
                'tamanio' => 'Mediano',
                'descripcionFisica' => 'Labrador negro de porte noble y obediente.',
                'fechaIngreso' => Carbon::now()->subDays(10),
            ],
        ];

        foreach ($mascotas as $data) {
            Mascota::updateOrCreate(
                ['nombre' => $data['nombre']],
                array_merge($data, [
                    'idEstadoMascota' => $estado->idEstadoMascota,
                    'idUsuario' => $usuario->idUsuario,
                ])
            );
        }
    }
}