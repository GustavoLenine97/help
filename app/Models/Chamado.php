<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $table = 'chamado';
    protected $primaryKey = 'id_chamado';
    public $timestamps = true;
    protected $fillable = [
        'id_chamado','id_user','id_cat','id_subcat','descricao','status'
    ];
}
