<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfessionController;
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

//public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/confession/{id}', [ConfessionController::class, 'show']);
Route::get('confessions/search/{title}', [ConfessionController::class, 'search']);
Route::post('/addConfession', [ConfessionController::class, 'store']);

//protected routes
Route::group(['middleware'=> ['auth:sanctum']], function () {
   Route::post('/addConfession', [ConfessionController::class, 'store']);
   Route::put('/confession/{id}', [ConfessionController::class, 'update']);
   Route::delete('/confession/{id}', [ConfessionController::class, 'destroy']);
   Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});