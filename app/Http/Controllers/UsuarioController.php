<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $usuario = new Usuario;
        $usuario->id_func = $req->id_func;
        $usuario->login = $req->login;
        $usuario->email = $req->email;
        $usuario->password = $req->password;
        $usuario->save();  
        return redirect('usuario');
    }

    public function formDeletarUsuario()
    {   
        $usuario = DB::table('usuario')
                    ->join('funcionario','usuario.id_func','=','funcionario.id_func')
                    ->select('usuario.*','funcionario.id_func','funcionario.nome_func')->get();
        return view('usuario.delete',['usuario' => $usuario]);
    }

    public function delete(Request $req)
    {
        $usuario = new Usuario;
        $usuario->id_usuario = $req->id_usuario;
        $usuario = DB::table('usuario')->where('id_usuario','=',$req->id_usuario)->delete();
        return redirect('usuario');
    }

    public function formAtualizarUsuario()
    {
        $usuario = DB::table('usuario')
                    ->join('funcionario','usuario.id_func','=','funcionario.id_func')
                    ->select('usuario.*','funcionario.id_func','funcionario.nome_func')->get();
        return view('usuario.update',['usuario' => $usuario ]);
    }

    public function formAtualizarDadosUsuario(Request $req)
    {   
        $usuario = new Usuario;
        $usuario->id_usuario = $req->id_usuario;
        $usuario = DB::table('usuario')->where('id_usuario','=',$usuario->id_usuario)->get();
        $funcionario = DB::table('funcionario')->select('id_func','nome_func')->get();
        return view('usuario.formUpdate',['usuario' => $usuario, 'funcionario' => $funcionario]);
    }

    public function update(Request $req)
    {
        $usuario = new Usuario;
        $usuario->id_func = $req->id_func;
        $usuario->login = $req->login;
        $usuario->email = $req->email;
        $usuario->password = $req->password;
        $usuario = DB::table('usuario')->where('id_usuario','=',$req->id_usuario)
                    ->update([
                        'id_func' => $usuario->id_func,
                        'login' => $usuario->login,
                        'email' => $usuario->email,
                        'password' => $usuario->password
                    ]);
        return redirect('usuario');               

    }

}
