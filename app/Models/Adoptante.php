<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Adoptante extends Model
{
    protected $table = 'adoptantes';
    protected $primaryKey = 'idAdoptante';
    public $timestamps = false;
}
