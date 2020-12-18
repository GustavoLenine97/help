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
    protected $request;
    private $repository;

    public function __construct(Request $request, ChamadoEncerrado $chamado_enc)
    {
        $this->request = $request;
        $this->repository = $chamado_enc;
    }

    public function index()
    {   
        $numero = 10;
        
        $chamado_enc = DB::table('chamado_encerrado')
                        ->join('chamado','chamado.id_chamado','=','chamado_encerrado.id_chamado')
                        ->join('Categoria','Categoria.CodigoCategoria','=','chamado.id_cat')
                        ->join('SubCategoria','SubCategoria.CodigoSubCategoria','=','chamado.id_subcat')
                        ->join('users','users.id','=','chamado.id_user')
                        ->select('chamado_encerrado.*','chamado.*','Categoria.*','SubCategoria.*','users.*')
                        ->orderBy('chamado_encerrado.id_cha_enc')
                        ->paginate($numero);
                        //->get();
        $json = json_encode($chamado_enc);
        return view('chamado_encerrado.index',['chamado_enc' => $chamado_enc,'json' => $json]);
    }

    public function indexJson()
    {   
        $chamado_enc = DB::table('chamado_encerrados')
                        ->select('tecnico','amount')
                        ->get();
        $json = json_encode($chamado_enc);
        return $json;
    }

    protected function save($id){
        $user = Auth::user();
        $chamado_enc = new ChamadoEncerrado;
        $chamado_enc->id_chamado = $id;
        $chamado_enc->tecnico = $user->name;
        $chamado_enc->save();
    }

    protected function encerrarChamado(Request $req)
    {
        $chamado_enc = new ChamadoEncerrado;
        $chamado_enc->id_cha_enc = $req->id_cha_enc;
        $chamado_enc = DB::table('chamado_encerrados')->where('id_cha_enc','=',$chamado_enc->id_cha_en)->delete();        
    }

    public function search(Request $request)
    {   
        $filters = $request->except('_token');
        
        $chamado_enc = $this->repository->search($request->filter);

        return view('chamado_encerrado.index',[
            'chamado_enc' => $chamado_enc,
            'filters' => $filters,
        ]);
    }
}
