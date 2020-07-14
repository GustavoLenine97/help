<?php

use App\Models\Subcategoria;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Rota Middleware o usuário precisa estar logado para poder acessar todas as rotas dentro desse grupo
Route::middleware(['auth'])->group(function ()
{

//Rotas pra locais
// Mostrar todos os Locais
Route::get('local','LocalController@index');

// Chama o formulário para cadastra o local
Route::get('local/cadastrar','LocalController@formCadastrarLocal');

//Deletar direto do banco de dados
Route::post('local/delete','LocalController@delete');

// Cadastrar o local no banco de dados
Route::post('local/submit','LocalController@save');

// Deletar
Route::get('local/deletar','LocalController@formDeletarLocal');

Route::post('local/delete','LocalController@delete'); 

// Atualizar local
Route::get('local/atualizar','LocalController@formAtualizarLocal');

Route::post('local/formUpdate','LocalController@formAtualizarDadosLocal');

Route::post('local/update','LocalController@update');



//Rotas Cargo
Route::get('cargo','CargoController@index');

Route::get('cargo/cadastrar','CargoController@formCadastrarCargo');

Route::post('cargo/submit','CargoController@save');

//Rotas Funcionário
Route::get('funcionario','FuncionarioController@index');

Route::get('funcionario/cadastrar','FuncionarioController@FormCadastrarFuncionario');

Route::post('funcionario/submit','FuncionarioController@save');

// Rotas Usuário
Route::get('usuario','UsuarioController@index');

Route::get('usuario/cadastrar','UsuarioController@FormCadastrarUsuario');

Route::post('usuario/submit','UsuarioController@save');

Route::get('usuario/deletar','UsuarioController@formDeletarUsuario');

Route::post('usuario/delete','UsuarioController@delete');

Route::get('usuario/atualizar','UsuarioController@formAtualizarUsuario');

Route::post('usuario/formUpdate','UsuarioController@formAtualizarDadosUsuario');

Route::post('usuario/update','UsuarioController@update');





// Rotas Chamados 

Route::get('chamado','ChamadoController@index');

Route::post('chamado/submit','ChamadoController@save')->name('chamado.submit');

});

// Código reduzido 
// Grupo de rotas categoria
// Rota prefixo, grupo de rotas que contém o mesmo prefixo, sem necessidade da url conter o nome, 
// ex: categoria/cadastrar, por estar dentro do grupo categoria ficará apenas /cadastrar
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'categoria'
], function (){
    // Rotas pra a Tabela Categoria
    // Mostrar as Categorias 
    Route::get('/','CategoriaController@index')->name('categoria-index');

    // Mostrar as SubCategorias da Categoria escolhida
    Route::get('/{request}/subcategoria','CategoriaController@subcategoria');

    // Rota pra chamar o formulário para cadastrar novas categorias
    Route::get('/cadastrar','CategoriaController@formCadastrarCategoria');

    // Rota post para cadastrar as categorias no banco de dados
    Route::post('/submit','CategoriaController@save');

    // Pesquisa as categorias
    Route::get('/find/{request}','CategoriaController@find');

    // Rota para deletar a categoria desejada 
    Route::get('/deletar','CategoriaController@formDeletarCategoria');

    // Rota para atualizar a categoria desejada 
    Route::get('/atualizar','CategoriaController@formAtualizarCategoria');

    Route::get('/sub','CategoriaController@sub');
});

Route::any('products/search', 'ProductController@search')->name('products.search')->middleware('auth');

Route::resource('products','ProductController')->middleware(['auth','check.is.admin']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('chamado/index','ChamadoController@index')->name('chamado.index');

Route::get('chamado/aberto','ChamadoController@chamadoAbertos');

Route::post('chamado/deletar','ChamadoController@deletar')->name('chamado.deletar');

Route::get('chamado/abrirchamado','ChamadoController@abrirChamado')->name('chamado.abrirchamado');

Route::get('chamado/datatable',function(){
    return view('chamado.datatable');
});

Route::get('chamado/destroy/{id}','ChamadoController@destroy')->name('chamado.destroy');

Route::get('chamado/fecharChamado/{id}','ChamadoController@fecharChamado')->name('chamado.fecharChamado');

Route::get('ajax-subcat',function(){
    $cat_id = Request::get('cat_id');

    $subcategories = Subcategoria::where('CodigoCategoria','=',$cat_id)->get();

    return Response::json($subcategories);

});

Route::resource('chamado_encerrado','ChamadoEncerradoController');

Route::get('chamado/chamado_encerrado/store/{id}','ChamadoEncerradoController@store');

Route::prefix('employee')
    ->as('employee.')
    ->group(function() {
        Route::get('home', 'Home\EmployeeHomeController@index')->name('home');
Route::namespace('Auth\Login')
      ->group(function() {
       Route::get('login', 'EmployeeController@showLoginForm')->name('login');
    Route::post('login', 'EmployeeController@login')->name('login');
    Route::post('logout', 'EmployeeController@logout')->name('logout');
      });
 });

Route::get('/teste','ChamadoController@chamadoAbertos')->middleware(['check.is.admin']);

Route::get('chamados/store/{id}','ChamadoEncerradoController@store');