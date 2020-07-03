<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $primaryKey = 'id_local';
    protected $table = 'local';
    public $timestamps = false;

    protected $fillable = ['id_local','nome_local','CEP'];
}
