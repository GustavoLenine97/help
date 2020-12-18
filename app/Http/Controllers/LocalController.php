<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocalController extends Controller
{
    public function index()
    {
        $local = DB::table('local')->select('local.*')->paginate(1);
        return view('local.index',['local' => $local]);
    }

    public function formCadastrarLocal()
    {
        return view("local.form");
    }
    
    public function save(Request $req)
    {
        $local = new Local;
        $local->nome_local = $req->nome_local;
        $local->numero = $req->numero;
        $local->CEP = $req->CEP;
        $local->rua = $req->rua;
        $local->bairro = $req->bairro;
        $local->cidade = $req->cidade;
        $local->estado = $req->estado;
        $local->telefone = $req->telefone;
        $local->save();
        return redirect('local');
    }

    public function formDeletarLocal()
    {   
        $local = DB::table('local')->select('id_local','nome_local','CEP')->get();
        return view('local.delete',['local' => $local]);
    }

    public function delete(Request $req)
    {   
        $local = new Local;
        $local->id_local = $req->id_local;
        $local = DB::table('local')->where('id_local','=',$local->id_local)->delete();
        return redirect('local');
    }
    
    protected function formUpdateLocal()
    {
        $local = DB::table('local')->select('id_local','nome_local')->get();
        return view('local.formUpdate',['local' => $local]);
    }

    protected function formAtualizarLocal(Request $req)
    {
        $local = DB::table('local')->select('local.*')->where('id_local','=',$req->id_local)->get();
        return view('local.update',['local' => $local]);
    }

    protected function update(Request $req)
    {
        $local = new Local;
        $local->id_local = $req->id_local;
        $local->nome_local = $req->nome_local;
        $local->CEP = $req->CEP;

        $local = DB::table('local')->where('id_local','=',$local->id_local)
                    ->update([
                        'nome_local' => $local->nome_local,
                        'numero' => $req->numero,
                        'CEP' => $local->CEP,
                        'rua' => $req->rua,
                        'bairro' => $req->bairro,
                        'cidade' => $req->cidade,
                        'estado' => $req->estado,
                        'telefone' => $req->telefone,
                    ]);

        return redirect('local');
    }

    protected function fone()
    {
        $local = DB::table('local')->select('local.*')->get();
        return view('local.fone',['local' => $local]);
    }
}
