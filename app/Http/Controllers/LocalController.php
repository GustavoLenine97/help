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
        $local = DB::table('local')->select('id_local','nome_local','CEP')->get();
        return view('local.index',['local' => $local]);
    }

    public function formCadastrarLocal()
    {
        return view("local.form");
    }
    
    public function save(Request $req)
    {
        // print_r($req->input());
        $local = new Local;
        $local->nome_local = $req->nome_local;
        $local->CEP = $req->CEP;
        $local->save();
        return redirect('local');
    }

    public function formDeletarLocal()
    {   
        $local = DB::table('local')->select('id_local','nome_local','CEP')->get();
        return view("local.delete",['local' => $local]);
    }

    public function delete(String $req)
    {   
        $local = new Local;
        $local = DB::table('local')->where('nome_local',$req)->select('nome_local')->get();
        echo $local;
    }

}
