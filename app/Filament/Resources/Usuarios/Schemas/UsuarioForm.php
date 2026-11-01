<?php

namespace App\Filament\Resources\Usuarios\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UsuarioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('idRol')
                    ->required()
                    ->numeric(),
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('apellidoPaterno')
                    ->required(),
                TextInput::make('apellidoMaterno'),
                TextInput::make('correo')
                    ->required(),
                TextInput::make('contraseña')
                    ->required(),
                Toggle::make('activo')
                    ->required(),
                DateTimePicker::make('fechaCreacion')
                    ->required(),
            ]);
    }
}
