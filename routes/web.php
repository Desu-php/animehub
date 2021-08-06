<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopController;

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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/top', [TopController::class, 'top'])->name('top');
Route::get('/{type}', [PostController::class, 'posts'])->name('posts');


Route::get('/{type}/category/{category}', [PostController::class, 'category'])->name('category');

Route::group(['prefix' => 'auth'], function (){
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
