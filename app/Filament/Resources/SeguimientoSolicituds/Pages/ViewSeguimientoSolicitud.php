<?php

namespace App\Filament\Resources\SeguimientoSolicituds\Pages;

use App\Filament\Resources\SeguimientoSolicituds\SeguimientoSolicitudResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSeguimientoSolicitud extends ViewRecord
{
    protected static string $resource = SeguimientoSolicitudResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
