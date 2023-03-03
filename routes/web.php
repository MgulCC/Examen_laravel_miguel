<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

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
Route::resource('post', PostController::class)->middleware('auth');

Route::resource('product', ProductController::class)->middleware('auth');

//La ruta que nos lleva a la lista de todos los posts
Route::get('/allpost', [PostController::class, 'getAll'])->name('posts.allpost');

Auth::routes(['register' => false, 'reset' => false]); //podemos decirle que desactive algunas seciones como registrarse o contraseña nueva

//la ruta de home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [PostController::class, 'index'])->name('home');
    Route::get('/', [ProductController::class, 'index'])->name('home');
    //La ruta que nos lleva a la lista de todos los posts
    Route::get('/mypost', [PostController::class, 'getMyPosts'])->name('posts.mypost');
});

