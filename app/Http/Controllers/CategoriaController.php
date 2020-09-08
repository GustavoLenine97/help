<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    // Função chama a view para mostrar todas as categorias 
    public function index()
    {
        $Categoria = DB::table('Categoria')->select('CodigoCategoria','DescricaoCategoria','AtivoCategoria')->get();
        return view('categoria.index',['cats' => $Categoria]);
    }

    // Função específica para mostrar todas as subcategoria do Hardware
    // Plano B caso a função subcategoria não funcione
    public function hardware()
    {
        $SubCategoria = DB::table('SubCategoria')->select('DescricaoSubCategoria')->where('CodigoCategoria','=','1')->get();
        return view('categoria.subcategoria',['subcats' => $SubCategoria]);
    }

    // Função específica para mostrar todas as subcategoria do Software
    // Plano B caso a função subcategoria não funcione
    public function software()
    {
        $SubCategoria = DB::table('SubCategoria')->select('DescricaoSubCategoria')->where('CodigoCategoria','=','2')->get();
        return view('categoria.subcategoria',['subcats' => $SubCategoria]);
    }

    // Função para mostrar todas as subcategoria da categoria escolhida 
    // Função criada para chamar os dados direto do Banco de Dados/Database
    // Caso seja criada uma nova categoria automaticamente será mostrado na view index das categorias
    // Sem necessidade criar linhas de códigos
    public function subcategoria(String $request)
    {
        $SubCategoria = DB::table('SubCategoria')
        ->join('Categoria','SubCategoria.CodigoCategoria','=','Categoria.CodigoCategoria')
        ->select('SubCategoria.DescricaoSubCategoria')->where('DescricaoCategoria','=',$request)->get();
        return view('categoria.subcategoria',['subcats' => $SubCategoria,]);
    }

    // Função para pesquisar determinada categoria 
    public function find(String $request)
    {
        $Categoria = DB::table('Categoria')->where('DescricaoCategoria','=',$request)->get();
        return view('categoria.index',['cats' => $Categoria]);
    }

    // Função para chamar a view que contém o formulário que cadastra as categorias no banco de dados
    public function formCadastrarCategoria()
    {
        return view("categoria.form");
    }

    // Função específica para cadastrar a Categoria direta no banco de dados
    // Passo 1 criar o objeto com o mesmo nome da tabela ex: $categoria = new Categoria
    // Passo 2 passar cada coluna da tabela correspondente
    public function save(Request $req)
    {
        // print_r($req->input());
        $categoria = new Categoria;
        $categoria->DescricaoCategoria = $req->DescricaoCategoria;
        $categoria->CodigoTipo = 1;
        $categoria->AtivoCategoria = 'S';
        $categoria->save();
        return redirect('categoria');   
    }

    protected function formDeletarCategoria()
    {
        $categoria = DB::table('Categoria')->select('CodigoCategoria','DescricaoCategoria')->get();
        return view('categoria.delete',['categoria' => $categoria]);
    }

    protected function delete(Request $req)
    {
        $categoria = new Categoria;
        $categoria->CodigoCategoria = $req->id_cat;
        $categoria = DB::table('Categoria')->where('CodigoCategoria','=',$categoria->CodigoCategoria)->delete();
        return redirect('categoria');
    }

    protected function formUpdateCategoria()
    {
        $categoria = DB::table('Categoria')->select('CodigoCategoria','DescricaoCategoria')->get();
        return view('categoria.formUpdate',['categoria' => $categoria]);
    }

    protected function formAtualizarCategoria(Request $req)
    {
        $categoria = DB::table('Categoria')->select('CodigoCategoria','DescricaoCategoria')->where('CodigoCategoria','=',$req->id_cat)->get();
        return view('categoria.update',['categoria' => $categoria]);
    }

    protected function update(Request $req)
    {
        $categoria = new Categoria;
        $categoria->CodigoCategoria = $req->CodigoCategoria;
        $categoria->DescricaoCategoria = $req->DescricaoCategoria;

        $categoria = DB::table('Categoria')->where('CodigoCategoria','=',$categoria->CodigoCategoria)
                        ->update([
                            'DescricaoCategoria' => $categoria->DescricaoCategoria
                        ]);
        
        return redirect('categoria');
    }

    // Cadastrar subcategoria
    protected function formCadastrarSubcategoria(String $request)
    {
        $subcat = DB::table('Categoria')->select('CodigoCategoria')->where('DescricaoCategoria','=',$request)->get();
        return view('subcategoria.form',['categoria' => $subcat]);
    }

    protected function saveSubCategoria(Request $req)
    {
        $SubCategoria = new Subcategoria;
        $SubCategoria->DescricaoSubCategoria = $req->DescricaoSubCategoria;
        $SubCategoria->CodigoCategoria = $req->subcategoria;
        
        DB::table('SubCategoria')->insert([
            ['DescricaoSubCategoria' => $SubCategoria->DescricaoSubCategoria,
             'CodigoCategoria' => $SubCategoria->CodigoCategoria
            ],
        ]);
        return redirect('categoria');
    }

    protected function formDeletarSubCategoria(String $request){
        $subcat = DB::table('SubCategoria')
                    ->join('Categoria','SubCategoria.CodigoCategoria','=','Categoria.CodigoCategoria')
                    ->select('SubCategoria.*')->where('Categoria.DescricaoCategoria','=',$request)->get();
        return view('subcategoria.delete',['subcat' => $subcat]);
    }

    protected function deleteSubCategoria(Request $req){
        $subcat = new Subcategoria;
        $subcat->CodigoSubCategoria = $req->id_subcat;
        $subcat = DB::table('SubCategoria')->where('CodigoSubCategoria','=',$subcat->CodigoSubCategoria)->delete();
        return redirect('categoria');
    }

    protected function formUpdateSubcategoria(String $request){
        $subcat = DB::table('SubCategoria')
                    ->join('Categoria','SubCategoria.CodigoCategoria','=','Categoria.CodigoCategoria')
                    ->select('SubCategoria.*')->where('Categoria.DescricaoCategoria','=',$request)->get();
        return view('subcategoria.formUpdate',['subcat' => $subcat]);
    }

    protected function formAtualizarSubcategoria(Request $req){
        $subcat = DB::table('SubCategoria')->select('SubCategoria.*')->where('CodigoSubCategoria','=',$req->id_subcat)->get();
        return view('subcategoria.update',['subcategoria' => $subcat]);
    }

    protected function updateSubCategoria(Request $req){
        $subcat = new Subcategoria;
        $subcat->CodigoSubCategoria = $req->CodigoSubCategoria;
        $subcat->DescricaoSubCategoria = $req->DescricaoSubCategoria;

        $subcat = DB::table('SubCategoria')->where('CodigoSubCategoria','=',$subcat->CodigoSubCategoria)
                    ->update([
                        'DescricaoSubCategoria' => $subcat->DescricaoSubCategoria
                    ]);
        return redirect('categoria');
    }

}
