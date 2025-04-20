<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rotas para o CRUD de Clínicas
Route::group(['prefix' => 'clinicas'], function () {
    Route::get('/', 'ClinicaController@index'); // Listar todas as clínicas
    Route::get('/{id}', 'ClinicaController@show'); // Mostrar uma clínica específica
    Route::post('/', 'ClinicaController@store'); // Criar nova clínica
    Route::put('/{id}', 'ClinicaController@update'); // Atualizar clínica
    Route::delete('/{id}', 'ClinicaController@destroy'); // Deletar clínica
});
Route::group(['prefix' => 'auth'], function () {
    Route::post('/', 'AuthController@login'); // Realizar login
});