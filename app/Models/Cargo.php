<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $primaryKey = 'id_cargo';
    protected $table = 'cargo';
    public $timestamps = false;
}
