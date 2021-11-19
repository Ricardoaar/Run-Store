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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/login/{driver}',
    [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])
    ->name('login.redirect');
Route::get('/login/{driver}/callback',
    [App\Http\Controllers\Auth\LoginController::class, 'getUserInformation'])
    ->name('login.callback');
