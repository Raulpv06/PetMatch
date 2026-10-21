<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especie extends Model
{
    protected $table = 'especies';
    protected $primaryKey = 'idEspecie';
    public $timestamps = false;

    public function razas() {
        return $this->hasMany(Raza::class, 'idEspecie', 'idEspecie');
    }
}
