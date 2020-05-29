<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table = 'SubCategoria';
    public $timestamps = false;

    protected $fillable = ['DescricaoSubCategoria','CodigoCategoria'];
}
