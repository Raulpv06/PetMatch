<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Solicitud extends Model
{
    protected $table = 'SOLICITUD';
    protected $primaryKey = 'idSolicitud';

    protected $fillable = [
        'idMascota',
        'idAdoptante',
        'idEstadoSolicitud',
        'idUsuario',
        'fechaSolicitud',
        'motivoRechazo',
        'fechaResolucion',
    ];

    public function estado(): BelongsTo
    {
        return $this->belongsTo(EstadoSolicitud::class, 'idEstadoSolicitud', 'idEstadoSolicitud');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    public function seguimientos(): HasMany
    {
        return $this->hasMany(SeguimientoSolicitud::class, 'idSolicitud', 'idSolicitud');
    }

    // Cuando mi compañera suba Mascota y Adoptante, agregamos:
    public function mascota(): BelongsTo
    {
        return $this->belongsTo(Mascota::class, 'idMascota', 'idMascota');
    }

    public function adoptante(): BelongsTo
    {
        return $this->belongsTo(Adoptante::class, 'idAdoptante', 'idAdoptante');
    }
}