<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
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
                    ->select('usuario.*','funcionario.*','local.*')
                    ->get();
        return view('usuario.index',['usuario' => $usuario]);
    }

    public function formCadastrarUsuario()
    {
        // Seleciona o funcionário, para cadastrar um novo usuário
        // Cada funcionário terá apenas um usuário
        $funcionario = DB::table('funcionario')->select('id_func','nome_func')->where('usuario_ativo','=','Pendente')->get();
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
        return redirect('usuario');     
    }

    protected function formUpdateUsuario()
    {
        $usuario = DB::table('usuario')->select('id_usuario','login')->get();
        return view('usuario.formUpdate',['usuarios' => $usuario]);
    }

    protected function formAtualizarUsuario(Request $req)
    {   
        $usuario = new Usuario;
        $usuario->id_usuario = $req->id_usuario;
        $usuario = DB::table('usuario')->select('usuario.*')->where('id_usuario','=',$usuario->id_usuario)->get();
        return view('usuario.update',['usuarios' => $usuario]);
    }

    protected function update(Request $req)
    {
        $usuario = new Usuario;
        $usuario->id_usuario = $req->id_usuario;
        $usuario->email = $req->email;
        $usuario->login = $req->login;
        $usuario->password = $req->password;

        $usuario = DB::table('usuario')->where('id_usuario','=',$usuario->id_usuario)
                    ->update([
                        'email' => $usuario->email,
                        'login' => $usuario->login,
                        'password' => $usuario->password
                    ]);
        return redirect('usuario'); 

    }

    

}
