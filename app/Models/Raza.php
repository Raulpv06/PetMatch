<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Raza extends Model
{
    protected $table = 'razas';
    protected $primaryKey = 'idRaza';
    public $timestamps = false;

    public function especie() {
        return $this->belongsTo(Especie::class, 'idEspecie', 'idEspecie');
    }
}
