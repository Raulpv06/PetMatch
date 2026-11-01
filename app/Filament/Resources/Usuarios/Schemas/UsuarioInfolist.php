<?php

namespace App\Filament\Resources\Usuarios\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UsuarioInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('idRol')
                    ->numeric(),
                TextEntry::make('nombre'),
                TextEntry::make('apellidoPaterno'),
                TextEntry::make('apellidoMaterno')
                    ->placeholder('-'),
                TextEntry::make('correo'),
                TextEntry::make('contraseña'),
                IconEntry::make('activo')
                    ->boolean(),
                TextEntry::make('fechaCreacion')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
