<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\Local;
use Dotenv\Result\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    public function index()
    {

        $func = DB::table('funcionario')
                    ->join('cargo','funcionario.id_cargo','=','cargo.id_cargo')
                    ->join('local','funcionario.id_local','=','local.id_local')
                    ->select('funcionario.*','cargo.cargo','local.nome_local')->get();
        return view('funcionario.index',['funcionario' => $func]);

    }

    public function formCadastrarFuncionario()
    {
        $local = DB::table('local')->select('id_local','nome_local','CEP')->get();
        $cargo = DB::table('cargo')->select('id_cargo','cargo')->get();
        return view("funcionario.form",['local' => $local,'cargo' => $cargo]);
    }

    public function save(Request $req)
    {
        $func = new Funcionario;
        $func->nome_func = $req->nome_func;
        $func->CPF = $req->CPF;
        $func->id_local = $req->id_local;
        $func->id_cargo = $req->id_cargo;
        $func->save();  
        return redirect('funcionario');
    }

    protected function FormDeletarFuncionario(){
        $funcionarios = DB::table('funcionario')->select('id_func','nome_func')->get();
        return view('funcionario.delete',['funcionarios'=> $funcionarios]);
    }

    public function delete(Request $req){
        $func = new Funcionario;
        $func->nome_func = $req->nome_func;
        DB::table('funcionario')->where('id_func', '=', $req->nome_func)->delete();
        return redirect('funcionario');
    }

    protected function FormAtualizarFuncionario(){
        $funcionarios = DB::table('funcionario')->select('id_func','nome_func')->get();
        return view('funcionario.update',['funcionarios'=> $funcionarios]);    
    }
}
