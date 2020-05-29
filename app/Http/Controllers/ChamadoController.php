<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
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

}
