<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\SkorController;
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

Route::get('/', [ClubController::class, 'index'])->name('club.index');
Route::post('/club', [ClubController::class, 'store'])->name('club.store');


Route::get('/skor', [SkorController::class, 'index'])->name('skor.index');
Route::post('/skor', [SkorController::class, 'store'])->name('skor.store');
