<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\ChamadoEncerrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class ChamadoEncerradoController extends Controller
{
    public function index()
    {   
        $chamado_enc = DB::table('chamado_encerrados')
                        ->join('users','users.id','=','chamado_encerrados.id_tec')
                        ->join('chamado','chamado.id_chamado','=','chamado_encerrados.id_chamado')
                        ->select('users.*','chamado_encerrados.*','chamado.*')
                        ->get();
        return view('chamado_encerrado.index',['chamado_enc' => $chamado_enc]);
    }

    public function save($id){
        $user = Auth::user();
        $chamado_enc = new ChamadoEncerrado;
        $chamado_enc->id_chamado = $id;
        $chamado_enc->id_tec = $user->id;
        $chamado_enc->save();
    }

    protected function encerrarChamado(Request $req)
    {
        $chamado_enc = new ChamadoEncerrado;
        $chamado_enc->id_cha_enc = $req->id_cha_enc;
        $chamado_enc = DB::table('chamado_encerrados')->where('id_cha_enc','=',$chamado_enc->id_cha_en)->delete();        
    }
}
