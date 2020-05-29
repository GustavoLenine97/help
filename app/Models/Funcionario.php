<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $primaryKey = 'id_func';
    protected $table = 'funcionario';
    public $timestamps = false;
}
