<?php

use App\Http\Controllers\BenuaController;
use App\Http\Controllers\Frontend;
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
    return view('frontend.homepage');
});

//Resource route section
Route::resource('kalender_beasiswa', KalenderBeasiswaController::class);
Route::resource('tingkat_studi', TingkatStudiController::class);
Route::resource('user', UserController::class);
Route::resource('level_user', LevelUserController::class);
Route::resource('negara', NegaraController::class);
Route::resource('benua', BenuaController::class);

// Custom Route Section

//Route soft delete, restore, dan force delete Kalender Beasiswa
Route::get('soft_delete', [KalenderBeasiswaController::class, 'soft_delete'])->name('kbeasiswa_soft_delete');
Route::post('kalender_beasiswa/restore/{id}', [KalenderBeasiswaController::class, 'restore'])->name('kbeasiswa_restore');
Route::delete('kalender_beasiswa/force_delete/{id}', [KalenderBeasiswaController::class, 'force_delete'])->name('kbeasiswa_force_delete');

//Route soft delete, restore, dan force delete Tingkat Studi
Route::get('soft_delete', [TingkatStudiController:: class, 'soft_delete'])->name('tingkat_studi_soft_delete');
Route::post('tingkat_studi/restore/{id}', [TingkatStudiController::class, 'restore'])->name('tingkat_studi_restore');
Route::delete('tingkat_studi/force_delete/{id}', [TingkatStudiController::class, 'force_delete'])->name('tingkat_studi_force_delete');

//Route soft delete, restore, dan force delete Negara
Route::get('soft_delete', [NegaraController:: class, 'soft_delete'])->name('negara_soft_delete');
Route::post('negara/restore/{id}', [NegaraController::class, 'restore'])->name('negara_restore');
Route::delete('negara/force_delete/{id}', [NegaraController::class, 'force_delete'])->name('negara_force_delete');

//Route soft delete, restore, dan force delete Benua
Route::get('soft_delete', [BenuaController:: class, 'soft_delete'])->name('benua_soft_delete');
Route::post('benua/restore/{id}', [BenuaController::class, 'restore'])->name('benua_restore');
Route::delete('benua/force_delete/{id}', [BenuaController::class, 'force_delete'])->name('benua_force_delete');

//Route soft delete, restore, dan force delete User
Route::get('soft_delete', [UserController:: class, 'soft_delete'])->name('user_soft_delete');
Route::post('user/restore/{id}', [UserController::class, 'restore'])->name('user_restore');
Route::delete('user/force_delete/{id}', [UserController::class, 'force_delete'])->name('user_force_delete');

//Route soft delete, restore, dan force delete Level User
Route::get('soft_delete', [LevelUserController:: class, 'soft_delete'])->name('level_user_soft_delete');
Route::post('level_user/restore/{id}', [LevelUserController::class, 'restore'])->name('level_user_restore');
Route::delete('level_user/force_delete/{id}', [LevelUserController::class, 'force_delete'])->name('level_user_force_delete');

//Route frontend
Route::get('frontend', [Frontend::class, 'homepage'])->name('homepage');