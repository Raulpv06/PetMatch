<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Raza extends Model implements HasName
{
    protected $table = 'razas';
    protected $primaryKey = 'idRaza';
    public $timestamps = false;

    // Permite la asignación masiva desde los formularios de Filament
    protected $fillable = [
        'idEspecie',
        'nombreRaza',
    ];

    public function getFilamentName(): string
    {
        return $this->nombreRaza;
    }

    public function especie(): BelongsTo
    {
        return $this->belongsTo(Especie::class, 'idEspecie', 'idEspecie');
    }

    public function mascotas(): HasMany
    {
        return $this->hasMany(Mascota::class, 'idRaza', 'idRaza');
    }
}