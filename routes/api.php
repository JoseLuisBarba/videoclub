<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\peliculaController;
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


Route::get('catalog', [peliculaController::class, 'index']);
Route::get('catalog/pelicula/{id}', [peliculaController::class, 'show']);
Route::post('catalog/pelicula/create', [peliculaController::class, 'store']);
Route::delete('catalog/pelicula/delete/{id}', [peliculaController::class, 'destroy']);
Route::put('catalog/pelicula/update/{id}', [peliculaController::class, 'update']);