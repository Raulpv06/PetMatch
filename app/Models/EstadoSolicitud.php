<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoSolicitud extends Model
{
    protected $table = 'ESTADO_SOLICITUD';
    protected $primaryKey = 'idEstadoSolicitud';
    protected $fillable = ['nombreEstado'];

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'idEstadoSolicitud', 'idEstadoSolicitud');
    }

    public function seguimientos(): HasMany
    {
        return $this->hasMany(SeguimientoSolicitud::class, 'idEstadoSolicitud', 'idEstadoSolicitud');
    }
}
