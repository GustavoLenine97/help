<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChamadoEncerrado extends Model
{
    protected $table = 'chamado_encerrado';
    protected $primaryKey = 'id_cha_enc';

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter){
            if($filter){
                $query->where('tecnico','LIKE',"%{$filter}%");
            }
        })//->toSql();
        ->paginate();

        return $results;
    }

}
