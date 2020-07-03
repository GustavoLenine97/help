<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use App\Models\Chamado;
use Yajra\DataTables\Facades\DataTables;

class ChamadoController extends Controller
{
    public function index(Request $request)
    {   
        if($request->ajax())
        {
            $data = Chamado::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button"
                            name="edit" id="'.$data->id_chamado.'"
                            class="btn btn-danger">Delete</button>
                        ';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        //$categoria = DB::table('Categoria')->select('CodigoCategoria','DescricaoCategoria','AtivoCategoria')->where('CodigoCategoria','<',7)->get();
        return view('chamado.index'); //,['categoria' => $categoria]);
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

    public function abrirChamado(){
        $categoria = DB::table('Categoria')->select('CodigoCategoria','DescricaoCategoria','AtivoCategoria')->get();
        return view('chamado.form',['categoria' => $categoria]);
    }

    public function chamadoAbertos()
    {
        $chamado = DB::table('chamado')
                        ->join('users','users.id','=','chamado.id_user')
                        ->join('Categoria','Categoria.CodigoCategoria','=','chamado.id_cat')
                        ->join('SubCategoria','SubCategoria.CodigoSubCategoria','=','chamado.id_subcat')
                        ->select('chamado.*','users.*','Categoria.*','SubCategoria.*')
                        ->where('chamado.status','=','Aberto')
                        ->get();
        $quantidade = DB::table('chamado')->get();
        
        $quantidades = $quantidade->count();

        return view('chamado.index',['chamado' => $chamado,'quantidade' => $quantidades]);
    }

    public function save(Request $req){
        $user = auth()->user();
        $chamado = New Chamado;
        $chamado->id_user = $user->id;
        $chamado->id_cat = $req->category;
        $chamado->id_subcat = $req->subcategory;
        $chamado->descricao = $req->descricao;
        $chamado->save();
        return redirect('chamado/aberto');      
    }

    public function deletar(Request $req){
        $chamado = new Chamado;
        $chamado->descricao = $req->deletar;
        dd($chamado->descricao);
    }

    public function destroy($id)
    {
        $data = Chamado::findOrFail($id);
        $data->delete();
    }
    
    public function fecharChamado($id)
    {   
        $chamado = new Chamado;
        
        $chamado = DB::table('chamado')->where('id_chamado','=',$id)
                ->update([
                    'status' => 'Fechado'    
                ]);
        return redirect('local');
    }

}
