<?php

use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserPostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [LoginController::class, 'create'])->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

// Admin Section
Route::middleware('permission:edit|publish')->group(function () {
    //create post
    Route::get('user/posts/create', [UserPostController::class, 'create']);
    Route::post('user/posts', [UserPostController::class, 'store']);

//update post
    Route::get('user/posts/{post}/edit', [UserPostController::class, 'edit']);
    Route::patch('user/posts/{post}', [UserPostController::class, 'update']);
});

//manage all posts by admin
Route::get('user/posts', [UserPostController::class, 'index'])->middleware('permission:manage');

Route::post('ckeditor/upload', [CKEditorController::class , 'upload'])->name('ckeditor.image-upload');

//delete post
Route::delete('user/posts/{post}', [UserPostController::class, 'destroy'])->middleware('permission:delete');


