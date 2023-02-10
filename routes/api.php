<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserAlbumController;
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
//Route::get('/albumi/{id}',[AlbumController::class,'show']);
Route::resource('albumi',AlbumController::class);
Route::get('/users/{id}',[UserController::class,'show'])->name('users.show');
Route::get('/users',[UserController::class,'index'])->name('users.index');
//Route::get('/users/{id}/albumi',[UserAlbumController::class,'index'])->name('users.albumi.show');
Route::resource('users.albumi', UserAlbumController::class)->only(['index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']],function(){
        Route::get('/profile',function(Request $request){
            return auth()->user();
        });
        Route::resource('albumi',AlbumController::class)->only(['update','store','destroy']);
        Route::post('/logout',[AuthController::class,'logout']);
    });

