<?php

use App\Models\Subcategoria;
use App\Http\Controllers\ChamadoController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    //echo 'Teste';
    return view('welcome');
});

Auth::routes();

Route::get('usuario/home','UsuarioController@home');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','check.is.admin'])->group(function () {

    Route::get('user/profile', function () {
    });

    Route::get('/rota1',function(){
        echo 'Rota 1';
        exit(1);
    })->name('rota1');

    Route::get('/rota2',function(){
        echo 'Rota 2';
        exit(1);
    })->name('rota2');

    // Rotas pra a Tabela Categoria
    // Mostrar as Categorias 
    Route::get('categoria','CategoriaController@index')->name('categoria');

    // Mostrar as SubCategorias da Categoria escolhida
    Route::get('categoria/{request}/subcategoria','CategoriaController@subcategoria')->name('categoria.sub');

    // Cadastrar subcategoria 
    // Formulário para Cadastrar Subcategoria
    Route::get('categoria/{request}/subcategoria/cadastrar','CategoriaController@formCadastrarSubcategoria');

    Route::post('categoria/{request}/subcategoria/submit','CategoriaController@saveSubCategoria');

    //Formulário para remover Subcategoria
    Route::get('categoria/{request}/subcategoria/deletar','CategoriaController@formDeletarSubcategoria');

    Route::post('categoria/{request}/subcategoria/delete','CategoriaController@deleteSubcategoria');

    //Formulário para atualizar Subcategoria
    // Primeiro escolhe qual subcategoria ira atualizar
    Route::get('categoria/{request}/subcategoria/atualizar','CategoriaController@formUpdateSubcategoria');
    
    // Em seguida alterar a subcategoria desejada, exemplo: Windows, altera para Windows 10
    Route::post('categoria/{request}/subcategoria/update','CategoriaController@formAtualizarSubcategoria');

    Route::post('categoria/{request}/subcategoria/updated','CategoriaController@updateSubCategoria');

    // Rota pra chamar o formulário para cadastrar novas categorias
    Route::get('categoria/cadastrar','CategoriaController@formCadastrarCategoria');

    // Rota post para cadastrar as categorias no banco de dados
    Route::post('categoria/submit','CategoriaController@save');

    // Pesquisa as categorias
    Route::get('categoria/find/{request}','CategoriaController@find');

    // Rota para deletar a categoria desejada 
    Route::get('categoria/deletar','CategoriaController@formDeletarCategoria');

    Route::post('categoria/delete','CategoriaController@delete');

    // Rota para atualizar a categoria desejada 
    Route::get('categoria/atualizar','CategoriaController@formUpdateCategoria');

    Route::post('categoria/update','CategoriaController@formAtualizarCategoria');

    Route::post('categoria/updated','CategoriaController@update');

    Route::get('categoria/count','CategoriaController@count');

    //Rotas pra locais
    // Mostrar todos os Locais
    Route::get('local','LocalController@index');

    // Chama o formulário para cadastra o local
    Route::get('local/cadastrar','LocalController@formCadastrarLocal');

    // Cadastrar o local no banco de dados
    Route::post('local/submit','LocalController@save');

    // Deletar
    Route::get('local/deletar','LocalController@formDeletarLocal');

    Route::post('local/delete','LocalController@delete'); 

    // Atualizar
    Route::get('local/atualizar','LocalController@formUpdateLocal');

    Route::post('local/update','LocalController@formAtualizarLocal');

    Route::post('local/updated','LocalController@update');

    // Chama as lista telefonica
    Route::get('local/fone','LocalController@fone');


    //Rotas Cargo
    Route::get('cargo','CargoController@index');

    Route::get('cargo/cadastrar','CargoController@formCadastrarCargo');

    Route::post('cargo/submit','CargoController@save');

    Route::get('cargo/deletar','CargoController@formDeletarCargo');

    Route::post('cargo/delete','CargoController@delete');

    Route::get('cargo/atualizar','CargoController@formUpdateCargo');

    Route::post('cargo/update','CargoController@formAtualizarCargo');

    Route::post('cargo/updated','CargoController@update');

    //Rotas Funcionário
    Route::get('funcionario','FuncionarioController@index');

    Route::get('funcionario/cadastrar','FuncionarioController@formCadastrarFuncionario');

    Route::post('funcionario/submit','FuncionarioController@save');

    // Deletar funcionario rota 1 chamar form, rota 2 depois deletar do banco de dados
    // Rota 1 
    Route::get('funcionario/deletar','FuncionarioController@formDeletarFuncionario');

    //Rota 2
    Route::post('funcionario/delete','FuncionarioController@delete')->name('delete');

    Route::get('funcionario/atualizar','FuncionarioController@formUpdateFuncionario');

    Route::post('funcionario/update','FuncionarioController@formAtualizarFuncionario');

    Route::post('funcionario/updated','FuncionarioController@update');

    // Mudar status do funcionário para Ativo/Pendente
    Route::get('usuario/funcionario/mudarstatususuarioativo/{id}','FuncionarioController@mudarStatusUsuarioAtivo');

    Route::get('usuario/funcionario/mudarstatususuariopendente/{id}','FuncionarioController@mudarStatusUsuarioPendente');

    Route::post('usuario/del',function(){

    });

    // Rotas Usuário
    Route::get('usuario','UsuarioController@index')->name('usuario');

    Route::get('usuario/cadastrar','UsuarioController@FormCadastrarUsuario');

    Route::post('usuario/submit','UsuarioController@save');

    Route::get('usuario/deletar','UsuarioController@formDeletarUsuario');

    Route::post('usuario/delete','UsuarioController@delete');

    Route::get('usuario/atualizar','UsuarioController@formUpdateUsuario');

    Route::post('usuario/update','UsuarioController@formAtualizarUsuario');

    Route::post('usuario/updated','UsuarioController@update');

    // Rotas Chamados 
    Route::get('chamado','ChamadoController@index');

//Route::get('chamado/index','ChamadoController@index')->name('chamado.index');

Route::post('chamado/deletar','ChamadoController@deletar')->name('chamado.deletar');

Route::get('chamado/teste','ChamadoController@teste')->name('chamado.teste');

Route::get('chamado/tester','ChamadoController@tester')->name('chamado.tester');

Route::get('chamado/destroy/{id}','ChamadoController@destroy')->name('chamado.destroy');

Route::get('chamado/aberto','ChamadoController@chamadoAbertos');

Route::get('chamado/count','ChamadoController@count');

Route::get('chamado/numero/{teste}','ChamadoController@numerochamado')->name('numero');

Route::resource('category','CategoryController');

Route::get('chamado_encerrado','ChamadoEncerradoController@index');

Route::get('chamado_encerrado/indexJson','ChamadoEncerradoController@indexJson')->name('chamado_encerrado.index');

Route::get('chamado/chamado_encerrado/{id}','ChamadoEncerradoController@save');

Route::any('chamado_encerrado/search','ChamadoEncerradoController@search')->name('encerrado.search');

Route::get('chamado/index','ChamadoController@alerttt');

Route::view('testes','teste')->name('tester');

Route::get('/hh',function(){
    echo 'Teste';
})->name('teste');

});

Route::get('ajax-subcat',function(){
    $cat_id = Request::get('cat_id');

    $subcategories = Subcategoria::where('CodigoCategoria','=',$cat_id)->get();

    return Response::json($subcategories);

});

Route::get('ajax-count/{cat_id}',function($cat_id){
    //$cat_id = Request::get('cat_id');

    $sub = ChamadoController::numerochamado($cat_id);//->get();

    return Response::json($sub);
});

Route::get('chamado/meuschamados','ChamadoController@meuschamados');

Route::get('chamado/abrirchamado','ChamadoController@abrirChamado')->name('chamado.abrirchamado');

Route::post('chamado/submit','ChamadoController@save');

Route::prefix('employee')
    ->as('employee.')
    ->group(function() {
        Route::get('home', 'Home\EmployeeHomeController@index')->name('home');
Route::namespace('Auth\Login')
      ->group(function() {
       Route::get('login', 'EmployeeController@showLoginForm')->name('login');
       Route::post('login.do', 'EmployeeController@llogin')->name('login.do');
       Route::post('logout', 'EmployeeController@logout')->name('logout');
    });
 });

Route::get('chamado/tester','ChamadoController@t')->name('a');

Route::get('chamado/aaa',function(){
    //echo date_default_timezone_get();
    echo date_default_timezone_set('America/Sao_Paulo');
})->name('ab');