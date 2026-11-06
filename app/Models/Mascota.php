<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mascota extends Model implements HasName
{
    protected $table = 'mascotas';
    protected $primaryKey = 'idMascota';
    public $timestamps = false;

    // Atributos asignables en camelCase idénticos a la migración
    protected $fillable = [
        'idRaza',
        'idEstadoMascota',
        'idUsuario',
        'nombre',
        'edadEstimadaMeses',
        'sexo',
        'tamanio',
        'descripcionFisica',
        'fechaIngreso',
    ];

    public function getFilamentName(): string
    {
        return $this->nombre;
    }

    public function raza(): BelongsTo
    {
        return $this->belongsTo(Raza::class, 'idRaza', 'idRaza');
    }

    public function estadoMascota(): BelongsTo
    {
        return $this->belongsTo(EstadoMascota::class, 'idEstadoMascota', 'idEstadoMascota');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'idMascota', 'idMascota');
    }
}