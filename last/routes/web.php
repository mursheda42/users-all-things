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
//if i don't wanna register in home page
//Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::post('/category', [App\Http\Controllers\HomeController::class, 'category']);
Route::get('/password-change', [App\Http\Controllers\HomeController::class, 'PasswordChange'])->name('password.change');
Route::post('/password-update', [App\Http\Controllers\HomeController::class, 'UpdatePassword'])->name('passwordcng.update');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('login.admin');
