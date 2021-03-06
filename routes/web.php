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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@new')->name('home');

// Route::get('/customers','CustomerController@index');
// Route::get('/customers/create','CustomerController@create');
// Route::post('/customers','CustomerController@insert');
// Route::get('/customers/{id}/edit','CustomerController@edit');
// Route::get('/customers/{id}','CustomerController@show');
// Route::put('/customers/{id}','CustomerController@update');
// Route::post('/customers/{id}','CustomerController@delete');

Route::post('renewal_histories/create/{id}', 'RenewalHistoryController@create');
Route::get('renewal_histories/create/{id}', 'RenewalHistoryController@create')->name('renewal_history.creates');
Route::resource('customers', 'CustomerController');
Route::resource('domains', 'DomainController');
Route::resource('registrars', 'RegistrarController');
Route::resource('renewal_histories', 'RenewalHistoryController');

Route::get('/haha', 'HomeController@new')->name('haha');

Route::get('/mailable', function () {
    return new App\Mail\DomainExpired();
});

