<?php

namespace App\Filament\Resources\Especies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EspecieForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombreEspecie')
                    ->required(),
            ]);
    }
}

