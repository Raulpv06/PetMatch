<?php

namespace App\Filament\Resources\Solicituds\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SolicitudInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('idMascota')
                    ->numeric(),
                TextEntry::make('idAdoptante')
                    ->numeric(),
                TextEntry::make('idEstadoSolicitud')
                    ->numeric(),
                TextEntry::make('idUsuario')
                    ->numeric(),
                TextEntry::make('fechaSolicitud')
                    ->dateTime(),
                TextEntry::make('motivoRechazo')
                    ->placeholder('-'),
                TextEntry::make('fechaResolucion')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
