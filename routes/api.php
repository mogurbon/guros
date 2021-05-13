<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MutationController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/login', [AuthController::class, 'login']);
Route::post('/mutation', [MutationController::class,'index'])->middleware('auth:sanctum');;
Route::get('/stats', [MutationController::class,'getMutationNum'])->middleware('auth:sanctum');;
