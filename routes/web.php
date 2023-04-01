<?php

use App\Http\Controllers\TodoNotePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'index']);

Route::get('/todonotes', [TodoNotePageController::class, 'index']);
Route::prefix('/todonotes') -> group ( function() {
    Route::get('/create', [TodoNotePageController::class, 'create']);
    Route::get('/{id}/edit', [TodoNotePageController::class, 'edit']);
    Route::delete('/{id}', [TodoNotePageController::class, 'destroy']);
    Route::get('/{id}', [TodoNotePageController::class, 'show']);
    Route::post('/store', [TodoNotePageController::class, 'store']);
    Route::put('/{id}/update', [TodoNotePageController::class, 'update']);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
