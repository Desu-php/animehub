<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Auth;

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

Route::get('/', [Controllers\IndexController::class, 'index'])->name('home');

Route::get('/top', [Controllers\TopController::class, 'top'])->name('top');
Route::get('/{type}', [Controllers\PostController::class, 'posts'])->name('posts');


Route::get('/{type}/category/{category}', [Controllers\PostController::class, 'category'])->name('category');

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('registration', [Auth\RegisterController::class, 'index'])->name('register');
    Route::post('registration', [Auth\RegisterController::class, 'store'])->name('register.store');
});
