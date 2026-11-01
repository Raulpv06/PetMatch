<?php

namespace App\Filament\Resources\Solicituds\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SolicitudForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('idMascota')
                    ->required()
                    ->numeric(),
                TextInput::make('idAdoptante')
                    ->required()
                    ->numeric(),
                TextInput::make('idEstadoSolicitud')
                    ->required()
                    ->numeric(),
                TextInput::make('idUsuario')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('fechaSolicitud')
                    ->required(),
                TextInput::make('motivoRechazo'),
                DateTimePicker::make('fechaResolucion'),
            ]);
    }
}
