<?php

namespace App\Filament\Resources\SeguimientoSolicituds\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SeguimientoSolicitudInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('idSolicitud')
                    ->numeric(),
                TextEntry::make('idEstadoSolicitud')
                    ->numeric(),
                TextEntry::make('idUsuario')
                    ->numeric(),
                TextEntry::make('fechaCambio')
                    ->dateTime(),
                TextEntry::make('notas')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
