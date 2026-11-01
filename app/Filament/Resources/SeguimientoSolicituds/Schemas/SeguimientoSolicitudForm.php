<?php

namespace App\Filament\Resources\SeguimientoSolicituds\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SeguimientoSolicitudForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('idSolicitud')
                    ->required()
                    ->numeric(),
                TextInput::make('idEstadoSolicitud')
                    ->required()
                    ->numeric(),
                TextInput::make('idUsuario')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('fechaCambio')
                    ->required(),
                Textarea::make('notas')
                    ->columnSpanFull(),
            ]);
    }
}
