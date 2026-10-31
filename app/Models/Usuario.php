<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements FilamentUser, HasName
{
    use Notifiable;

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
        'remember_token',
    ];

    /**
     * Mapea la contraseña hacia la columna 'contraseña'
     */
    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    /**
     * Nombre que muestra Filament en la esquina superior derecha
     */
    public function getFilamentName(): string
    {
        return "{$this->nombre} {$this->apellidoPaterno}";
    }

    /**
     * Control de acceso al panel de Filament
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return (bool) $this->activo;
    }

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