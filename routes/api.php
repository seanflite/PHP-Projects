<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoNoteController;

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

Route::get('/todonotes', [TodoNoteController::class, 'index']);
Route::prefix('/todonotes') -> group ( function() {
    Route::post('/store', [TodoNoteController::class, 'store']);
    Route::put('/{id}', [TodoNoteController::class, 'update']);
    Route::delete('/{id}', [TodoNoteController::class, 'destroy']);
    Route::get('/{id}', [TodoNoteController::class, 'show']);
});