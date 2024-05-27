<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\peliculaController;
use App\Http\Controllers\CatalogueControlle;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// user
Route::get('/', [
    CustomAuthController::class, 'index'
]);
Route::get('dashboard', [
    CatalogueControlle::class, 'index'
]);
Route::post('/catalog/add', [CatalogueControlle::class, 'add']);
Route::get('/catalog/edit/{id}', [CatalogueControlle::class, 'edit']);
Route::post('/catalog/update/{id}', [CatalogueControlle::class, 'update']);
Route::get('/catalog/delete/{id}', [CatalogueControlle::class, 'delete']);

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');




