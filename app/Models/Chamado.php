<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    
    protected $table = 'chamado';
    protected $primaryKey = 'id_chamado';
    protected $fillable = [
        'id_chamado','name','descricao','status'
    ];
}
