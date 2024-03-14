<?php

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

Route::get('/', [\App\Http\Controllers\KlasmenController::class, 'index']);

Route::get('club', [\App\Http\Controllers\ClubController::class, 'index']);
Route::post('club', [\App\Http\Controllers\ClubController::class, 'submit']);
Route::delete('club/{id}', [\App\Http\Controllers\ClubController::class, 'delete']);

Route::get('score', [\App\Http\Controllers\ScoreController::class, 'index']);
Route::get('score/multi', [\App\Http\Controllers\ScoreController::class, 'multiScore']);
Route::post('score', [\App\Http\Controllers\ScoreController::class, 'submit']);

Route::post('score/multi', [\App\Http\Controllers\ScoreController::class, 'multiScoreSubmit']);
