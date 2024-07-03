<?php

use App\Http\Controllers\BenuaController;
use App\Http\Controllers\KalenderBeasiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\TingkatStudiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('kalender_beasiswa', KalenderBeasiswaController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('tingkat_studi', TingkatStudiController::class);
Route::resource('user', UserController::class);
Route::resource('level_user', LevelUserController::class);
Route::resource('negara', NegaraController::class);
Route::resource('benua', BenuaController::class);

