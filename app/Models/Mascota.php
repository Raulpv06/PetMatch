<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mascota extends Model
{
    protected $table = 'mascotas';
    protected $primaryKey = 'idMascota';
    public $timestamps = false;

    public function raza(): BelongsTo
    {
        return $this->belongsTo(Raza::class, 'idRaza', 'idRaza');
    }

    // Relación con EstadoMascota (Una mascota pertenece a un estado)
    public function estadoMascota(): BelongsTo
    {
        return $this->belongsTo(EstadoMascota::class, 'idEstadoMascota', 'idEstadoMascota');
    }

    // Relación con Usuario
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}
