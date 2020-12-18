<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Chamado;
use DateTime;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Boolean;

class ChamadoController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Chamado::latest()->get())
                    ->addColumn('action',function($data){
                            $button = '<button type="button"
                            name="edit" id="'.$data->id_chamado.'"
                            class="btn btn-danger"> Fechar </button>';
                            return $button;
                    })
                    ->addColumn('aaction',function($data){
                        if($data->descricao === 'Teste'){
                            return $data->id_chamado;
                        }                    
                    })
                    ->rawColumns(['action','aaction'])
                    ->make(true);
            //return DB::table('Categoria')->select('CodigoCategoria','DescricaoCategoria','AtivoCategoria')->where('CodigoCategoria','<',7)->get();
        }
        $chamado = DB::table('chamado')
                    ->join('users','users.id','=','chamado.id_user')
                    ->join('Categoria','Categoria.CodigoCategoria','=','chamado.id_cat')
                    ->join('SubCategoria','SubCategoria.CodigoSubCategoria','=','chamado.id_subcat')
                    ->select('chamado.*','users.*','Categoria.*','SubCategoria.*')
                    ->where('chamado.status_chamado','=','Aberto')
                    ->paginate(5);
        //return Carbon::parse($chamado)->toDateString();

        //return response()->json($chamado);            
        return view('chamado.index',['chamado' => $chamado]);       
    }

    public function funcaoda(){
        echo 'Teste';
    }

    public function teste()
    {
        $chamado = Chamado::select('descricao');    
        return Datatables::of($chamado)->make(true);
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

    public function abrirChamado()
    {
        $categoria = DB::table('Categoria')->select('CodigoCategoria','DescricaoCategoria','AtivoCategoria')->get();
        return view('chamado.form',['categoria' => $categoria])->with('success','Login Successfully!');
    }

    public function save(Request $req)
    {   
        $user = Auth::user();
        $chamado = New Chamado;
        $chamado->id_user = $user->id;
        $chamado->id_cat = $req->category;
        $chamado->id_subcat = $req->subcategory;
        $chamado->descricao = $req->descricao;
        $chamado->save();
        return redirect('home')->with('success', 'Task Created Successfully!');;       
    }

    public function chamadoAbertos()
    {
        $chamado = DB::table('chamado')
                        ->join('users','users.id','=','chamado.id_user')
                        ->join('Categoria','Categoria.CodigoCategoria','=','chamado.id_cat')
                        ->join('SubCategoria','SubCategoria.CodigoSubCategoria','=','chamado.id_subcat')
                        ->select('chamado.*','users.*','Categoria.*','SubCategoria.*')
                        ->where('chamado.AtivoCategoria','=','S')
                        ->get();
        $quantidade = DB::table('chamado')->get();
        
        $quantidades = $quantidade->count();

        return view('chamado.index',['chamado' => $chamado
        ]);
    }

    public function delete(String $req)
    {   
        $chamado = new Chamado;
        $chamado = DB::table('chamado')->where('id_chamado',$req)->select('nome_local')->get();
    }

    public function deletar(){
        dd('Teste');
    }

    public function tester(int $id){
        dd($id);
    }

    protected function destroy($id){
        
        $chamado = new Chamado;
        $chamado->id_chamado = $id;
        $chamado = DB::table('chamado')->where('id_chamado','=',$chamado->id_chamado)
                    ->update([
                        'status_chamado' => 'Fechado'
                    ]);

        $chamado_hora = DB::table('chamado_encerrado')->where('id_cha_enc','=',$id)
                        ->select('chamado_encerrado.data_e')
                        ->get();
        
        $data2 = "22/02/2020";            
                        
        $data1 = implode('/', array_reverse(explode('/', $chamado_hora)));
        $data2 = implode('-', array_reverse(explode('/', $data2)));

        
        $d1 = strtotime($data1);               
        $d2 = strtotime($data2);
         
        $dataFinal = ($d2 - $d1) /86400;

        if($dataFinal < 0)
            $dataFinal *= -1;

        echo $dataFinal;
    }


    protected function alerttt(){
        Alert::alert('Title', 'Message', 'Type');
        echo 'Teste';
    }

    private $totalPage = 10;

    protected function meuschamados(){
        $user = Auth::user();
        $chamado = DB::table('chamado')
                        ->join('Categoria','Categoria.CodigoCategoria','=','chamado.id_cat')
                        ->join('SubCategoria','SubCategoria.CodigoSubCategoria','=','chamado.id_subcat')
                        ->select('chamado.*','Categoria.*','SubCategoria.*')
                        ->where('chamado.id_user','=',$user->id)
                        ->paginate($this->totalPage);
        return view('chamado.meuschamados',['chamado' => $chamado]);
    }

    public function count(){
        $chamado = DB::table('users')
                    //->join('users','users.id','=','chamado.id_user')
                    ->select('id','name')
                    ->get();//->count();
        //echo $chamado;  
        
        $count = DB::table('chamado')
        ->join('users','users.id','=','chamado.id_user')
        ->select('chamado.*','users.*')
        ->where('id_user','=','[1-9]')
        ->get()->count();
        
        echo $count;
        //$counter = ChamadoController::numerochamado(1);

        //return view('chamado.count',[ 'chamado' => $chamado , 'quantidade' => $count]);
    }

    public static function numerochamado($teste){
        $chamado = DB::table('users')
                    //->join('users','users.id','=','chamado.id_user')
                    ->select('id','name')
                    ->get();//->count();
        
        $count = DB::table('chamado')
        ->join('users','users.id','=','chamado.id_user')
        ->select('chamado.*','users.*')
        ->where('id_user','=',$teste)
        ->get()->count();
        return response()->json($count);
        //return view('chamado.count',['quantidade' => $count ]);
    }

    public function t(){
        return view('chamado.teste');
    }
}
