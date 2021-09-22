<?php

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

Route::prefix('insaelements')->group(function() {
    Route::get('/index', 'InsaelementsController@index');

    Route::get('/SolicitarPrestamo', 'SolicitarController@index')->name('insaelements.general.Solicitar');

    Route::post('/ajaxPeopleByDocument', 'SolicitarController@ajaxPeopleByDocumentPost')->name('insaelements.general.ajaxPeopleByDocument');


	Route::post('/ajaxElementByCode', 'SolicitarController@ajaxElementByCodePost')->name('insaelements.general.Solicitar.ajaxElementByCode');

	Route::post('/guardarSolicitud', 'SolicitarController@store')->name('insaelements.general.Solicitar.guardarSolicitud');

    Route::get('/InvenElements', 'InventarioController@index');
    //admin
    Route::get('/admin', function(){
        return view('insaelements::admin.admin');
    });
    Route::get('/registro', 'RegistroController@index');
    // Route::post('/ajaxPeopleByDocumentRegistro', 'RegistroController@ajaxPeopleByDocumentPost')->name('insaelements.admin.ajaxPeopleByDocument');
    // Route::post('/registrodetalle{$movement->id}', 'RegistroController@update')->name('registrodetalle');
    Route::get('/registroseach', 'RegistroController@search')->name('registro.search');



});
