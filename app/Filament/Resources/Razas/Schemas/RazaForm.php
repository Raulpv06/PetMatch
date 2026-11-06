<?php

namespace App\Filament\Resources\Razas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RazaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Importa Select y vincula con la clave foránea e identificador de ESPECIE
                Select::make('idEspecie')
                    ->label('Especie')
                    ->relationship('especie', 'nombreEspecie')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('nombreRaza')
                    ->label('Nombre de la Raza')
                    ->required()
                    ->maxLength(80),
            ]);
    }
}