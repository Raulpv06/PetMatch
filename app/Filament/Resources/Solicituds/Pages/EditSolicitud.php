<?php

namespace App\Filament\Resources\Solicituds\Pages;

use App\Filament\Resources\Solicituds\SolicitudResource;
use App\Models\EstadoMascota;
use App\Models\SeguimientoSolicitud;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSolicitud extends EditRecord
{
    protected static string $resource = SolicitudResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $solicitud = $this->getRecord();

        // 1. Bitácora automática en SEGUIMIENTO_SOLICITUD
        SeguimientoSolicitud::create([
            'idSolicitud'       => $solicitud->idSolicitud,
            'idEstadoSolicitud' => $solicitud->idEstadoSolicitud,
            'idUsuario'         => auth()->id() ?? $solicitud->idUsuario,
            'fechaCambio'       => now(),
            'notas'             => 'Actualización de estado procesada desde el panel administrativo.',
        ]);

        // 2. Si la solicitud se aprobó (idEstadoSolicitud = 2), la mascota pasa a 'Adoptado'
        if ((int) $solicitud->idEstadoSolicitud === 2) {
            $estadoAdoptado = EstadoMascota::where('nombreEstado', 'Adoptado')->first();
            
            if ($estadoAdoptado && $solicitud->mascota) {
                $solicitud->mascota->idEstadoMascota = $estadoAdoptado->idEstadoMascota;
                $solicitud->mascota->save();
            }
        }
    }
}