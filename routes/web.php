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



//Landing Page//

Route::get('/', function () {
    return view('Landing.index');
});



//----CADASTRO----//

Route::get('/cadastro', function () {
    return view('Auth.cadastro');
})->Name('DespesasX - Cadastro')->middleware('guest');

Route::post('/cadastro', 'App\Http\Controllers\UserController@registro')->middleware('guest');





//----LOGIN----//

Route::get('/login', function () {
    return view('Auth.login');
})->Name('DespesasX - Login')->middleware('guest');

Route::post('/login', 'App\Http\Controllers\UserController@login')->middleware('guest');



//Logout//
Route::get('/logout', 'App\Http\Controllers\UserController@logout')->middleware('auth');




//DESPESAS - GET//

Route::get('/despesas/adicionar', function () {
    return view('SistemaDespesas.novo');
})->Name('DespesasX - Nova Despesa')->middleware('auth');


Route::get('/despesas/anteriores', function () {
    return view('SistemaDespesas.Anterior');
})->Name('DespesasX - Despesas anteriores')->middleware('auth');


Route::get('/despesas/', 'App\Http\Controllers\DespesasController@verDespesas')->middleware('auth')->Name('DespesasX - Inicio');

Route::get('/despesas/editar/{id}', 'App\Http\Controllers\DespesasController@editaDespesaIndex')->middleware('auth')->Name('DespesasX - Editar');

Route::get('/despesas/delete/{id}', 'App\Http\Controllers\DespesasController@delete')->middleware('auth')->Name('DespesasX - Delete');

Route::get('ajax/dadosTabela', 'App\Http\Controllers\DespesasController@AjaxDespesas')->middleware('auth');



//DESPESAS - POST, PUT//
Route::post('/despesas/anteriores', 'App\Http\Controllers\DespesasController@verDespesasTotalAnteriores')->middleware('auth')->Name('DespesasX - Despesas anteriores');

Route::post('/despesas/adicionar', 'App\Http\Controllers\DespesasController@nova')->middleware('auth');

Route::put('/despesas/editar/{id}', 'App\Http\Controllers\DespesasController@edita')->middleware('auth')->Name('DespesasX - Editando');





//GERENCIAMENTO DE USUARIOS - GET//

Route::get('/gerenciamento', 'App\Http\Controllers\GerenciaUserController@verSolicitacao')
->Name('DespesasX - Usuarios Gerenciamento')->middleware('auth');

Route::get('/API/Aceitar/{id}', 'App\Http\Controllers\GerenciaUserController@aceitar')
->Name('DespesasX - Aceitar')->middleware('auth');

Route::get('/API/unBlock/{id}', 'App\Http\Controllers\GerenciaUserController@desbloquear')
->Name('DespesasX - unBlock')->middleware('auth');

Route::get('/API/Delete/{id}', 'App\Http\Controllers\GerenciaUserController@deletar')
->Name('DespesasX - Deletar')->middleware('auth');

Route::get('/API/Block/{id}', 'App\Http\Controllers\GerenciaUserController@bloquear')
->Name('DespesasX - Block')->middleware('auth');

Route::get('/gerenciamento/ativos', 'App\Http\Controllers\GerenciaUserController@verAtivos')
->Name('DespesasX - Usuarios Ativos')->middleware('auth');



