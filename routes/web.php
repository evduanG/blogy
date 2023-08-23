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

Auth::routes();
Route::get('/', [App\Http\Controllers\posts\PostController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\posts\PostController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\posts\PostController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\posts\PostController::class, 'about'])->name('about');


Route::group(['prefix' => 'posts'], function () {
    Route::get('/index', [App\Http\Controllers\posts\PostController::class, 'index'])->name('post.index');
    Route::get('/single/{id}', [App\Http\Controllers\posts\PostController::class, 'single'])->name('post.single');
    Route::post('/comment-store', [App\Http\Controllers\posts\PostController::class, 'storeComment'])->name('comment.store');
    Route::get('/create-post', [App\Http\Controllers\posts\PostController::class, 'createPost'])->name('post.create');
    Route::post('/post-store', [App\Http\Controllers\posts\PostController::class, 'storePost'])->name('post.store');
    Route::delete('/post-delete/{id}', [App\Http\Controllers\posts\PostController::class, 'deletePost'])->name('post.delete');

    // update
    Route::get('/post-edit/{id}', [App\Http\Controllers\posts\PostController::class, 'editPost'])->name('post.edit');
    Route::post('/post-update/{id}', [App\Http\Controllers\posts\PostController::class, 'updatePost'])->name('post.update');

    Route::any('/search', [App\Http\Controllers\posts\PostController::class, 'search'])->name('post.search');
});


Route::group(['prefix' => 'categories'], function () {
    Route::get('/category/{name}', [App\Http\Controllers\categories\CategoryController::class, 'category'])->name('category.single');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/edit/{id}', [App\Http\Controllers\Users\UsersController::class, 'editProfile'])->name('users.edit');
    Route::any('/update/{id}', [App\Http\Controllers\Users\UsersController::class, 'updateProfile'])->name('users.update');
    Route::get('/profile/{id}', [App\Http\Controllers\Users\UsersController::class, 'profile'])->name('users.profile');
});

Route::get('/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'viewLogin'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'checkLogin'])->name('admin.check.login');

Route::group(['prefix' => 'admin', 'middleware' => 'admin.auth'], function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admins.dashboard');
    Route::get('/show-admins', [App\Http\Controllers\Admin\AdminController::class, 'showAdmins'])->name('admins.show');
    Route::get('/create-admins', [App\Http\Controllers\Admin\AdminController::class, 'createAdmins'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\Admin\AdminController::class, 'storeAdmins'])->name('admins.store');
});
