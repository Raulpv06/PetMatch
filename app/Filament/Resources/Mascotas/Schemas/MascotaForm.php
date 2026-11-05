<?php

namespace App\Filament\Resources\Mascotas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Support\Collection;
use App\Models\Raza;

class MascotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Forms\Components\TextInput::make('nombre')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('especie_id')
                ->relationship(name: 'especie', titleAttribute: 'nombreEspecie') // <- Apunta al nombre real de la columna
                ->required()
                ->live() // Permite actualizar en tiempo real el formulario
                ->afterStateUpdated(fn (Set $set) => $set('raza_id', null)), // Limpia la raza si cambia la especie
            Forms\Components\Select::make('raza_id')
                ->label('Raza')
                ->options(fn (Get $get): Collection => Raza::query()
                    ->where('idEspecie', $get('especie_id'))
                    ->pluck('nombreRaza', 'idRaza'))
                ->required()
                ->searchable()
                ->preload(),
            Forms\Components\Select::make('sexo')
                ->options([
                    'Macho' => 'Macho',
                    'Hembra' => 'Hembra',
                ])
                ->required(),

            Forms\Components\Select::make('tamano')
                ->label('Tamaño')
                ->options([
                    'Pequeño' => 'Pequeño',
                    'Mediano' => 'Mediano',
                    'Grande' => 'Grande',
                ])
                ->required(),

            Forms\Components\DatePicker::make('fecha_ingreso')
                ->required()
                ->default(now()),

            Forms\Components\Select::make('estado_inicial')
                ->options([
                    'Disponible' => 'Disponible',
                    'En tratamiento' => 'En tratamiento',
                    'Reservado' => 'Reservado',
                ])
                ->required()
                ->default('Disponible'),

            // Campo oculto para guardar automáticamente el ID del usuario en sesión
            Forms\Components\Hidden::make('user_id')
                ->default(fn () => auth()->id())
                ->required(),
        ]);
    }
}
