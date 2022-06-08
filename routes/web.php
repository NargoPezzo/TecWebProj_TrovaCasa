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

Route::post('/offerte', 'PublicController@showOfferteFiltrate')
        ->name('offerte.search');

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
Route::get('/modificalocatario', 'Auth\ModificaLocatarioController@editAccount')
        ->name('modificalocatario');

Route::post('/modificalocatario', 'Auth\ModificaLocatarioController@saveAccount')
        ->name('modificalocatario.save');

Route::get('/modificalocatore', 'Auth\ModificaLocatoreController@editAccount')
        ->name('modificalocatore');

Route::post('/modificalocatore', 'Auth\ModificaLocatoreController@saveAccount')
        ->name('modificalocatore.save');


Route::view('/home', 'home')
        ->name('home');

//Rotte Locatario
/*Route::get('/locatario', 'LocatarioController@index') 
        ->name('locatario')->middleware('can:isLocatario');*/

/*Route::get('/homelocatario', 'LocatarioController@indexhome')
        ->name('homelocatario')->middleware('can:isLocatario');*/

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

Route::get('/admin/stats', "AdminController@statistics")
        ->name('statistiche');

Route::get('/admin/stats/search', "AdminController@getStats")
        ->name('admin.stats.search');

// Rotte Offerta singola
Route::get('/offertasingola/{id}', 'PublicController@showOfferta')   
        ->name('offertasingola');

// Rotte per l'alloggio
Route::get('/inseriscialloggio', 'LocatoreController@createAlloggio')
        ->name('inseriscialloggio');

Route::post('/inseriscialloggio', 'LocatoreController@storeAlloggio')
        ->name('inseriscialloggio.store');

Route::get('/gestiscialloggi', 'LocatoreController@getMyAlloggi')
        ->name('gestiscialloggi')->middleware('can:isLocatore');

Route::get('eliminaalloggio/{id}', 'LocatoreController@deleteAlloggio')
        ->name('eliminaalloggio');

Route::post('modificaalloggio', 'LocatoreController@editAlloggio')
        ->name('modificaalloggio')->middleware('can:isLocatore');

// Rotte per le faq
Route::get('/inseriscifaq', 'AdminController@createFaq')
        ->name('inseriscifaq');

Route::post('/inseriscifaq', 'AdminController@storeFaq')
        ->name('inseriscifaq.store');

Route::get("eliminafaq/{id}", 'AdminController@deleteFaq')
        ->name('eliminafaq');

Route::post('modificafaq', 'AdminController@editFaq')
        ->name('modificafaq')->middleware('can:isAdmin');



/*
Route::get('/offertelocatario', 'LocatarioController@indexoffertelocatario')   POTREBBE ESSERE INUTILE
        ->name('offertelocatario')->middleware('can:isLocatario');  */

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home'); ME L'HA AGGIUNTA IL TERMINALEEEEEEEEEE */


Route::get('/messaggistica', 'PublicController@showChat')
        ->name('messaggistica');

Route::post('/messaggisticapost', 'PublicController@sendMessaggio')
        ->name('messaggisticapost');

Route::get('/chat/{user}', 'PublicController@showUserChat')
        ->name('chat');

Route::post('/locatario/messaggio', 'LocatarioController@sendMessaggio')
        ->name('messaggio')->middleware('can:isLocatario');

Route::get('/city/{province}', 'PublicController@getCittà')->name('city')->middleware('can:isLocatario');


Route::post('/locatario/opzionato', 'LocatarioController@sendOpzionato')
        ->name('opzionato.store')->middleware('can:isLocatario');