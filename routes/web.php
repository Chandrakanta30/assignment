<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CustomLogger;
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
Route::get('user/delete/{id}',[UserController::class,'destroy'])->name('user.destroy');
Route::get('todo/delete/{id}',[TodoController::class,'destroy'])->name('todo.destroy');
Route::resource('user', UserController::class);
Route::resource('todo', TodoController::class);
Route::resource('log', CustomLogger::class);