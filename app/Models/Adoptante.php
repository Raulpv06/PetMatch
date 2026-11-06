<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Adoptante extends Model implements HasName
{
    protected $table = 'adoptantes';
    protected $primaryKey = 'idAdoptante';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'telefono',
        'correo',
        'alcaldia',
        'codigoPostal',
        'direccionLinea',
        'fechaRegistro',
    ];

    // Define la etiqueta que muestra Filament en selectores y cabeceras
    public function getFilamentName(): string
    {
        return trim("{$this->nombre} {$this->apellidoPaterno} {$this->apellidoMaterno}");
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'idAdoptante', 'idAdoptante');
    }
}