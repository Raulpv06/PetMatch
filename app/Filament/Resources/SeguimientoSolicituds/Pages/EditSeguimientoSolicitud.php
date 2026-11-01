<?php

namespace App\Filament\Resources\SeguimientoSolicituds\Pages;

use App\Filament\Resources\SeguimientoSolicituds\SeguimientoSolicitudResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSeguimientoSolicitud extends EditRecord
{
    protected static string $resource = SeguimientoSolicitudResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
