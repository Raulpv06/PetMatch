<?php

namespace App\Filament\Resources\Adoptantes\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;

class AdoptanteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                TextInput::make('apellidoPaterno')
                    ->required()
                    ->maxLength(255),
                TextInput::make('apellidoMaterno')
                    ->maxLength(255),
                TextInput::make('telefono')
                    ->label('Teléfono')
                    ->tel()
                    ->required()
                    ->numeric()
                    ->length(10) // Exactamente 10 dígitos
                    ->validationAttribute('teléfono'),
                TextInput::make('correo')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true) // Valida formato y unicidad en la base de datos
                    ->maxLength(255),
                TextInput::make('direccionLinea')
                    ->required(),
                TextInput::make('alcaldia')
                    ->label('Alcaldía / Municipio')
                    ->required()
                    ->maxLength(255),
                TextInput::make('codigoPostal')
                    ->label('Código Postal')
                    ->required()
                    ->numeric()
                    ->length(5),
                DateTimePicker::make('fechaRegistro')
                    ->required(),
            ]);
    }
}
