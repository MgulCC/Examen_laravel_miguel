<?php

use App\Http\Controllers\V1\PostApiController;
use App\Http\Controllers\V1\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\AuthController; //implementar esto

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::prefix('v1')->group(function(){
    //Todo lo que haya en este grupo se accederá escribiendo ~/api/v1/*
    Route::post('login', [AuthController::class, 'authenticate']);
   
   //registro
   Route::post('register', [AuthController::class, 'register']);

   Route::group(['middleware' => ['jwt.verify']], function(){
       //todo lo que haya en este grupo requiere autenticacion de usuario
       Route::post('logout', [AuthController::class, 'logout']);

       //ruta para obtener usuario
       Route::post('get-user', [AuthController::class, 'getUser']);

       //las rutas para que nos de los posts
       Route::get('posts', [PostApiController::class, 'index']);
       
       //mostrar un post
       Route::get('posts/{id}', [PostApiController::class, 'showOne']);

       //Crear post
       Route::post('posts', [PostApiController::class, 'store']);

       //hacer un update
       Route::put('posts/{id}', [PostApiController::class, 'update']);

       //las rutas para que nos de los products
       Route::get('products', [ProductApiController::class, 'index']);
       //mostrar un post
       Route::get('products/{id}', [ProductApiController::class, 'showOne']);

       //Crear post
       Route::post('products', [ProductApiController::class, 'store']);

       //hacer un update
       Route::put('products/{id}', [ProductApiController::class, 'update']);
   });
 });
 
