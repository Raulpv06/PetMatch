<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    protected $table = 'USUARIO';
    protected $primaryKey = 'idUsuario';

    protected $fillable = [
        'idRol',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'correo',
        'contraseña',
        'activo',
        'fechaCreacion',
    ];

    protected $hidden = [
        'contraseña',
    ];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'idRol', 'idRol');
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'idUsuario', 'idUsuario');
    }

    public function seguimientos(): HasMany
    {
        return $this->hasMany(SeguimientoSolicitud::class, 'idUsuario', 'idUsuario');
    }
}