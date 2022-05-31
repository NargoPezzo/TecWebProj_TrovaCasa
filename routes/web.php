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

Route::get('/', function () {
    return view('home');
});

Route::get('/offerte', 'PublicController@showOfferte')
        ->name('offerte');

Route::view('/chisiamo','chisiamo')
        ->name('chisiamo');

Route::view('/dovesiamo','dovesiamo')
        ->name('dovesiamo');

Route::get('/faq', 'PublicController@showFaqs')
        ->name('faq');

Route::view('/condizioni','condizioni')
        ->name('condizioni');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

// Rotte per la registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');

//Rotte per la modifica
Route::get('/modificautente', 'Auth\ModificaUtenteController@editAccount')
        ->name('modificautente');

Route::post('/modificautente', 'Auth\ModificaUtenteController@saveAccount')
        ->name('modificautente.save');

Route::get('/home', function () {
    return view('home');
});

//Rotte Locatario
Route::get('/locatario', 'LocatarioController@index') 
        ->name('locatario')->middleware('can:isLocatario');

Route::get('/homelocatario', 'LocatarioController@indexhome')
        ->name('homelocatario')->middleware('can:isLocatario');

//Rotte Locatore
Route::get('/locatore', 'LocatoreController@index') 
        ->name('locatore')->middleware('can:isLocatore');

Route::get('/homelocatore', 'LocatoreController@indexhome')
        ->name('homelocatore')->middleware('can:isLocatore');

//Rotte Admin
Route::get('/admin', 'AdminController@index') 
        ->name('admin')->middleware('can:isAdmin');

Route::get('/homeadmin', 'AdminController@indexhome')
        ->name('homeadmin')->middleware('can:isAdmin');

// Rotte Offerta singola
Route::get('/offertasingola/{id}', 'PublicController@showOfferta')   
        ->name('offertasingola');

/*
Route::get('/offertelocatario', 'LocatarioController@indexoffertelocatario')   POTREBBE ESSERE INUTILE
        ->name('offertelocatario')->middleware('can:isLocatario');  */

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home'); ME L'HA AGGIUNTA IL TERMINALEEEEEEEEEE */