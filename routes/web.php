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

Route::get('/home', function () {
    return view('home');
});
Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home'); ME L'HA AGGIUNTA IL TERMINALEEEEEEEEEE */


