<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class UsuarioController extends Controller
{
    public function index(){
        $usuario = DB::table('usuario')
                    ->join('funcionario','usuario.id_func','=','funcionario.id_func')
                    ->join('local','funcionario.id_local','=','local.id_local')
                    ->select('usuario.*','funcionario.id_func','funcionario.nome_func','local.nome_local')
                    ->get();
        return view('usuario.index',['usuario' => $usuario]);
    }

    public function formCadastrarUsuario()
    {
        $funcionario = DB::table('funcionario')->select('id_func','nome_func')->get();
        return view('usuario.form',['funcionario' => $funcionario]);
    }

    public function save(Request $req)
    {
        $func = new Usuario;
        $func->id_func = $req->id_func;
        $func->login = $req->login;
        $func->email = $req->email;
        $func->password = $req->password;
        $func->save();  
        return redirect('usuario');
    }

    protected function formDeletarUsuario()
    {
        $usuario = DB::table('usuario')->select('id_usuario','login')->get();
        return view('usuario.delete',['usuarios' => $usuario]);
    }

    protected function delete(Request $req)
    {   
        $usuario = new Usuario;
        $usuario->id_usuario = $req->id_usuario;
        $usuario = DB::table('usuario')->where('id_usuario','=',$usuario->id_usuario)->delete();
        return redirect()->route('usuario');
    }

}
