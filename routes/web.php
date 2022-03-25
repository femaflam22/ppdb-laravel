<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [RegisterController::class, 'index'])->name('index');
Route::get('/detail/{id}', [RegisterController::class, 'show'])->name('show');
Route::get('/create', [RegisterController::class, 'create'])->name('create');
Route::post('/', [RegisterController::class, 'store'])->name('store');
Route::get('/update/{id}', [RegisterController::class, 'edit'])->name('edit');
Route::patch('/{id}', [RegisterController::class, 'update'])->name('update');
Route::delete('/{id}', [RegisterController::class, 'destroy'])->name('destroy');
