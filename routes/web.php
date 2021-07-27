<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Login;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Permissoes;

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

Route::get('/','LoginController@index')->name('sistema.login');
Route::post('/','LoginController@login')->name('sistema.login');

Route::get('/cadastro','CadastroController@index')->name('sistema.cadastro');
Route::post('/cadastro','CadastroController@cadastro')->name('sistema.cadastro');

//fallback



Route::middleware(Login::class)->prefix('/sistema')->group(function () {
    Route::get('/home', 'HomeController@index')->name('logado.home');
    Route::get('/info', 'HomeController@info')->name('logado.info');

    Route::get('/turma', 'AdicionaRegistros@indexTurma')->name('turma.index');
    Route::post('/turma', 'AdicionaRegistros@adicionaTurma')->name('turma.registro');
    
    //relatorios
    Route::prefix('/relatorios')->group(function () {
    Route::get('/' ,'RelatorioPdfController@index')->name('relatorio.index');
    Route::get('/alunos' ,'RelatorioPdfController@criaRelatorioAlunos')->name('relatorio.alunos');
    Route::get('/turmas' ,'RelatorioPdfController@criaRelatorioTurmas')->name('relatorio.turmas');
    Route::post('/turmas','RelatorioPdfController@criaRelatorioDeterminadaTurma')->name('relatorioDeterminada.turmas');
    });

    Route::get('/aluno', 'AdicionaRegistros@indexAluno')->name('aluno.index');    
    Route::post('/aluno', 'AdicionaRegistros@adicionaAluno')->name('aluno.registro');

    Route::prefix('/visualiza')->group(function (){
    Route::get('/menu','VisualizaRegistrosController@index')->name('menu.visualiza');
    Route::get('/alunos','VisualizaRegistrosController@indexAluno')->name('aluno.visualiza');
    Route::get('/turmas','VisualizaRegistrosController@indexTurma')->name('turma.visualiza');
    Route::get('/personalizada','VisualizaRegistrosController@indexPersonalizada')->name('personalizada.visualiza');
    Route::post('/personalizada','VisualizaRegistrosController@pesquisaPersonalizada')->name('personalizada.pesquisa');

    //update e delete de alunos
    Route::middleware(Permissoes::class)->group(function (){
    Route::get('alunos/deleta/{id?}','VisualizaRegistrosController@deletaRegistroAluno')->name('aluno.deleta');
    Route::get('alunos/edita/{id?}','VisualizaRegistrosController@editaRegistroAluno')->name('aluno.edita');
    Route::post('alunos/edita','VisualizaRegistrosController@updateRegistroAluno')->name('aluno.update');

    //update e delete de turmas
    Route::get('turmas/deleta/{id?}','VisualizaRegistrosController@deletaRegistroTurma')->name('turma.deleta');
    Route::get('turmas/edita/{id?}','VisualizaRegistrosController@editaRegistroTurma')->name('turma.edita');
    Route::post('turmas/edita','VisualizaRegistrosController@updateRegistroTurma')->name('turma.update');
    
    });
    
    });

    //Controle admin
    Route::middleware(Admin::class)->prefix('/admin')->group(function () {
        Route::get('/usuario', 'AdminController@index')->name('admin.index');
        Route::get('/cadastrados', 'AdminController@cadastrados')->name('admin.cadastrados');

        Route::get('cadastro/deleta/{id?}','AdminController@deletaCadastrado')->name('admin.deleta');
        Route::post('cadastro/edita/{id?}','AdminController@editaCadastrado')->name('admin.edita');
    });

    

    Route::get('/logout', 'LoginController@logout')->name('logado.logout');
});
