<?php

namespace App\Filament\Resources\Mascotas\Schemas;

use App\Models\EstadoMascota;
use App\Models\Raza;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;

class MascotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(80),

                // Selector de apoyo: no existe en la tabla mascotas, por eso dehydrated(false)
                Select::make('idEspecie')
                    ->label('Especie')
                    ->relationship('raza.especie', 'nombreEspecie')
                    ->live()
                    ->dehydrated(false)
                    ->afterStateUpdated(fn (Set $set) => $set('idRaza', null))
                    ->required(),

                // Guarda la clave foránea real idRaza
                Select::make('idRaza')
                    ->label('Raza')
                    ->options(fn (Get $get): Collection => Raza::query()
                        ->where('idEspecie', $get('idEspecie'))
                        ->pluck('nombreRaza', 'idRaza'))
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('sexo')
                    ->label('Sexo')
                    ->options([
                        'M' => 'Macho',
                        'H' => 'Hembra',
                    ])
                    ->required(),

                Select::make('tamanio')
                    ->label('Tamaño')
                    ->options([
                        'Chico'   => 'Pequeño',
                        'Mediano' => 'Mediano',
                        'Grande'  => 'Grande',
                    ])
                    ->required(),

                TextInput::make('edadEstimadaMeses')
                    ->label('Edad estimada (meses)')
                    ->numeric()
                    ->minValue(1)
                    ->nullable(),

                DatePicker::make('fechaIngreso')
                    ->label('Fecha de ingreso')
                    ->required()
                    ->default(now()),

                Select::make('idEstadoMascota')
                    ->label('Estado inicial')
                    ->relationship('estadoMascota', 'nombreEstado')
                    ->default(fn () => EstadoMascota::where('nombreEstado', 'Disponible')->value('idEstadoMascota') ?? 1)
                    ->required(),

                // Clave foránea del usuario que registra
                Hidden::make('idUsuario')
                    ->default(fn () => auth()->id() ?? 1),
            ]);
    }
}