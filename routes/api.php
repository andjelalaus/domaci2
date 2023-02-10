<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumPesmaController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PesmaController;
use App\Http\Controllers\UserAlbumController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//albumi
Route::get('/albumi/{id}',[AlbumController::class,'show']);
Route::get('/albumi',[AlbumController::class,'index']);

//pesme
Route::get('/pesme/{id}',[PesmaController::class,'show']);
Route::get('/pesme',[PesmaController::class,'index']);
//useri
Route::get('/users/{id}',[UserController::class,'show'])->name('users.show');
Route::get('/users',[UserController::class,'index'])->name('users.index');

//user album
Route::get('/users/{id}/albumi',[UserAlbumController::class,'index'])->name('users.albumi.show');

Route::get('/albumi/{id}/pesme',[AlbumPesmaController::class,'index'])->name('albumi.pesma.show');




//registracija i login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){
        Route::get('/profile',function(Request $request){
            return auth()->user();
        });
        Route::resource('users',UserController::class)->only(['update','edit','destroy']);
        Route::resource('albumi',AlbumController::class)->only(['update','store','destroy']);
        //user album
        Route::resource('users.albumi', UserAlbumController::class)->only(['update','edit','destroy']);;
        //album pesma
        Route::resource('albumi.pesme', AlbumPesmaController::class)->only(['update','store','destroy']);
        Route::resource('pesme',PesmaController::class)->only(['update','store','destroy']);
        Route::resource('albumi',AlbumController::class)->only(['update','store','destroy']);

        Route::post('/logout',[AuthController::class,'logout']);
    });
  

