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

Route::get('/', function () {
    return view('welcome');
})->middleware(['validate_user']);
Route::get('/clase', function () {
    return view('mi-clase');
});

//Path de la ruta, 'NombreDelController@FuncionDentroDelController'
Route::get('/prueba-controller', 'PruebaController@index');

Route::resource('coins', 'CoinsController');
Route::resource('users', 'UsersController')->middleware(['validate_user']);

Route::get('register', 'AuthController@register')->name('auth.register');
Route::post('register', 'AuthController@doRegister')->name('auth.do-register');
Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('login', 'AuthController@doLogin')->name('auth.do-login');
Route::any('logout', 'AuthController@logout')->name('auth.logout');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['validate_user'])->name('dashboard');

Route::post('/users','UsersController@upload');
