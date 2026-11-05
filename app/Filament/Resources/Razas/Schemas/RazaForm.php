<?php

namespace App\Filament\Resources\Razas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RazaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('especie_id')
                    ->relationship('especie', 'nombre')
                    ->required(),
                TextInput::make('nombreRaza')
                    ->required(),
                
            ]);
    }
}

