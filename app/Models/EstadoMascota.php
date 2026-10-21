<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoMascota extends Model
{
    protected $table = 'estado_mascotas';
    protected $primaryKey = 'idEstadoMascota';
    public $timestamps = false;
}
