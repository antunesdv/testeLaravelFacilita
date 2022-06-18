<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {return view('welcome');}); //home
Route::get('/login', function () {return view('login');}); //tela de login
Route::get('/dashboard', function () {return view('dashboard');}); //dashboard

Route::post('/verifyLogin', 'App\Http\Controllers\LoginController@verifyLogin'); //verifica o login se é válido
Route::get('/logout', 'App\Http\Controllers\LoginController@logout'); // apaga session e redireciona para home

Route::get('/CadastroUser/view', 'App\Http\Controllers\UserController@index');//view form cadastro clientes
Route::post('/UsersCadastro', 'App\Http\Controllers\UserController@cadastro');//funcao pós form para cadastrar os dados
Route::get('/consultaUsers', 'App\Http\Controllers\UserController@consultaAll');//view de consulta users *
Route::get('/users/{id}', 'App\Http\Controllers\UserController@consultaID'); //consulta específica por id mostrando mais informações
Route::post('/atualizarUsers/{id}', 'App\Http\Controllers\UserController@atualizar'); //Atualizar os dados do usuário
Route::get('/deletarUsers/{id}', 'App\Http\Controllers\UserController@deletar'); //deletar usuário
Route::post('/filtrarUsers', 'App\Http\Controllers\UserController@filtrar'); // filtrar usuário

Route::get('/CadastroLivro/view', 'App\Http\Controllers\LivrosController@index'); //view form cadastro livros
Route::post('/LivrosCadastro', 'App\Http\Controllers\LivrosController@cadastro'); //funcao pós form para cadastrar os dados
Route::get('/consultaLivros', 'App\Http\Controllers\LivrosController@consultaAll'); //view de consulta livros *
Route::post('/filtrarLivros', 'App\Http\Controllers\LivrosController@filtrar'); //filtro os livros digitados
Route::get('/livros/{id}', 'App\Http\Controllers\LivrosController@consultaID');//consulta específica por id mostrando mais informações
Route::post('/atualizarLivros/{id}', 'App\Http\Controllers\LivrosController@atualizar');//Atualizar os dados do livro
Route::get('/deletarLivros/{id}', 'App\Http\Controllers\LivrosController@deletar'); //deletar livro

Route::get('/alocarLivro/{id}', 'App\Http\Controllers\LivrosController@alocarLivroEscolha'); //view de consulta livros *
Route::get('/alocarLivro/{id}/{id_livro}', 'App\Http\Controllers\LivrosController@AlocarLivro'); //view de consulta livros *
Route::get('/livrosDevolucao/{id}/{id_livro}', 'App\Http\Controllers\LivrosController@DevolucaoLivro'); //devolver livro selecionado
