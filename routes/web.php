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
Route::get('/posts/single/{id}', [App\Http\Controllers\posts\PostController::class, 'single'])->name('post.single');
Route::post('/posts/comment-store', [App\Http\Controllers\posts\PostController::class, 'storeComment'])->name('comment.store');
Route::get('/posts/create-post', [App\Http\Controllers\posts\PostController::class, 'createPost'])->name('post.create');
Route::post('/posts/post-store', [App\Http\Controllers\posts\PostController::class, 'storePost'])->name('post.store');
Route::delete('/posts/post-delete/{id}', [App\Http\Controllers\posts\PostController::class, 'deletePost'])->name('post.delete');

// update
Route::get('/posts/post-edit/{id}', [App\Http\Controllers\posts\PostController::class, 'editPost'])->name('post.edit');
Route::post('/posts/post-update/{id}', [App\Http\Controllers\posts\PostController::class, 'updatePost'])->name('post.update');
