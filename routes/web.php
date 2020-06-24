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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    // Route::get('/', function () {
        // Uses first & second Middleware
    // });

    Route::get('user/profile', function () {
        // Uses first & second Middleware
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
    Route::get('categoria','CategoriaController@index')->name('categoria')->middleware(['auth','check.is.admin']);

    // Mostrar as SubCategorias da Categoria escolhida
    Route::get('categoria/{request}/subcategoria','CategoriaController@subcategoria')->name('categoria.sub');

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
    Route::get('categoria/atualizar','CategoriaController@formAtualizarCategoria');

    Route::get('categoria/sub','CategoriaController@sub');

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


    //Rotas Cargo
    Route::get('cargo','CargoController@index');

    Route::get('cargo/cadastrar','CargoController@formCadastrarCargo');

    Route::post('cargo/submit','CargoController@save');

    //Rotas Funcionário
    Route::get('funcionario','FuncionarioController@index');

    Route::get('funcionario/cadastrar','FuncionarioController@FormCadastrarFuncionario');

    Route::post('funcionario/submit','FuncionarioController@save');

    // Deletar funcionario rota 1 chamar form, rota 2 depois deletar do banco de dados
    // Rota 1 
    Route::get('funcionario/deletar','FuncionarioController@FormDeletarFuncionario');

    //Rota 2
    Route::post('funcionario/delete','FuncionarioController@delete')->name('delete');

    // Rotas Usuário
    Route::get('usuario','UsuarioController@index');

    Route::get('usuario/cadastrar','UsuarioController@FormCadastrarUsuario');

    Route::post('usuario/submit','UsuarioController@save');

    // Rotas Chamados 
    Route::get('chamado','ChamadoController@index');

    Route::get('ajax-subcat',function(){
        $cat_id = Request::get('cat_id');

        $subcategories = Subcategoria::where('CodigoCategoria','=',$cat_id)->get();

        return Response::json($subcategories);

    });

    Route::post('chamado/submit','ChamadoController@save');

    Route::get('chamado/abertos','ChamadoController@chamadoAbertos')->name('chamado.abertos');

});

Route::resource('category','CategoryController');
