<?php
use App\Models\Config;

Route::middleware(['home'])->get('/', function(){

    $config = Config::all()->first();

    return view('home', compact('config'));
});

// ROTAS ADMINISTRADOR
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth', 'middleware' => 'admin'], function(){

    // ADMIN HOME
    Route::get('/', 'Admin\HomeController@index')->name('home');

    Route::get('/gerar-lista-inscritos', 'Admin\InscricoesController@showFormGerarListaInscritos')->name('form.gerar-lista-inscritos');
    Route::post('/gerar-lista-inscritos', 'Admin\InscricoesController@gerarListaInscritos')->name('submit.gerar-lista-inscritos');
});

// ROTAS CANDIDATO
Route::group(['prefix' => 'candidato', 'as' => 'candidato.', 'middleware' => ['auth', 'candidato']], function(){

    Route::get('/inscricao/gerar/ficha', 'Candidato\CandidatoController@gerarFichaInscricao')->name('inscricao.gerar.ficha');

    Route::get('/', 'Candidato\HomeController@index');
    Route::get('/home', 'Candidato\HomeController@index')->name('home');
    Route::get('/alterar-senha', 'Candidato\MinhaContaController@formAlterarSenha')->name('form.alterar.senha');
    Route::post('/alterar-senha', 'Candidato\MinhaContaController@alterarSenha')->name('alterar.senha.submit');
});

Auth::routes();
