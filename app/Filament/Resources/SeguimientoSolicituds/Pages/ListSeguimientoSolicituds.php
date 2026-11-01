<?php

namespace App\Filament\Resources\SeguimientoSolicituds\Pages;

use App\Filament\Resources\SeguimientoSolicituds\SeguimientoSolicitudResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSeguimientoSolicituds extends ListRecords
{
    protected static string $resource = SeguimientoSolicitudResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
