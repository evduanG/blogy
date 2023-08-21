<?php

use App\View\Components\posts\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts/index', [App\Http\Controllers\posts\PostController::class, 'index'])->name('post.index');
Route::get('/posts/single', [App\Http\Controllers\posts\PostController::class, 'single'])->name('post.single');
