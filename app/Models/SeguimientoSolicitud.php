<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeguimientoSolicitud extends Model
{
    protected $table = 'SEGUIMIENTO_SOLICITUD';
    protected $primaryKey = 'idSeguimientoSolicitud';

    protected $fillable = [
        'idSolicitud',
        'idEstadoSolicitud',
        'idUsuario',
        'fechaCambio',
        'notas',
    ];

    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(Solicitud::class, 'idSolicitud', 'idSolicitud');
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(EstadoSolicitud::class, 'idEstadoSolicitud', 'idEstadoSolicitud');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}
