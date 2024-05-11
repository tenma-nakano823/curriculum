<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //外部にあるPostControllerクラスをインポート。

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [PostController::class, 'index']);  
/*
Route::get('/',function () {
    return view('posts.index');
});
*/
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);
//'/posts/{対象データのID}'にGetリクエストが来たら, PostControllerメソッドのshowメソッドを実行する.
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit',[PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);