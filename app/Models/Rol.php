<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rol extends Model
{
    protected $table = 'ROL';
    protected $primaryKey = 'idRol';
    protected $fillable = ['nombreRol'];

    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'idRol', 'idRol');
    }
}