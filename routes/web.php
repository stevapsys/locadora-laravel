<?php

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

//ROTAS PRA REDIRECIONAMENTO DE PÁGINAS
Route::get('/episodes', 'EpisodeController@index');

Route::get('/filmes/{id}', 'filmeController@procurarFilmeId');

Route::get('/filmes/procurar/{nome}', 'filmeController@procurarFilmeNome');

Route::get('/filmes', 'filmeController@listar'); 

Route:: get('/adicionar-filme', 'FilmeController@adicionarFilme');

Route:: post('/adicionar-filme', 'FilmeController@adicionarFilmePost');

Route::get('/adicionar-usuario', 'UserController@create');

Route::post('/adicionar-usuario', 'UserController@store');

Route::get('/usuarios', 'UserController@index');

//ROUTA PRA MOSTRAR UMA INFO DO BANCO DE DADOS
Route::get('/collection', function() {
    //$movie = App\Movie::find(1);
    //dd($movie->genre->toArray());

    $actor = App\Actor::find(1);
    dd($actor->first_name, $actor->favorite->toArray());
});

//rota para a API
Route::apiResource('filmes', 'ApiFilmeController');