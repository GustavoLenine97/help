<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Chamado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChamadoController extends Controller
{
    public function index()
    {
        $categoria = DB::table('Categoria')->select('CodigoCategoria','DescricaoCategoria','AtivoCategoria')->where('CodigoCategoria','<',7)->get();
        return view('chamado.form',['categoria' => $categoria]);
    }

    public function ajax(Request $req)
    {
        $categoria = new Categoria;
        $ajax['success'] = false;
        $categoria->DescricaoCategoria = $req->DescricaoCategoria;
        $ajax['success'] = false;
        //$ajax['message'] = $req->DescricaoCategoria;
        $ajax['message'] = 'Positive';
        echo json_encode($ajax);    
    }

    public function save(Request $req)
    {   
        $chamado = New Chamado;
        $chamado->id_user = 2;
        $chamado->id_cat = $req->category;
        $chamado->id_subcat = $req->subcategory;
        $chamado->descricao = $req->descricao;
        $chamado->save();
        return redirect('chamado/abertos');       
    }

    public function chamadoAbertos()
    {
        $chamado = DB::table('chamado')
                        ->join('users','users.id','=','chamado.id_user')
                        ->join('Categoria','Categoria.CodigoCategoria','=','chamado.id_cat')
                        ->join('SubCategoria','SubCategoria.CodigoSubCategoria','=','chamado.id_subcat')
                        ->select('chamado.*','users.*','Categoria.*','SubCategoria.*')
                        ->get();
        $quantidade = DB::table('chamado')->get();
        
        $quantidades = $quantidade->count();

        return view('chamado.index',['chamado' => $chamado,
                                     'quantidades' => $quantidades
        ]);
    }

    public function delete(String $req)
    {   
        $chamado = new Chamado;
        $chamado = DB::table('chamado')->where('id_chamado',$req)->select('nome_local')->get();
        echo $local;
    }



}
