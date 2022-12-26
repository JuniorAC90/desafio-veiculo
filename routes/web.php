<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManutencoesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VeiculosController;
use App\Http\Middleware\Autenticador;
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

Route::get('/', function () {
    return redirect('/veiculos');
})->middleware(Autenticador::class);

Route::resource('/manutencoes', ManutencoesController::class)->only(['index', 'create', 'store','destroy', 'edit', 'update']);
Route::resource('/veiculos', VeiculosController::class)->only(['index', 'create', 'store','destroy', 'edit', 'update']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('entrar.index');
Route::get('/logout', [LoginController::class, 'destroy'])->name('sair');

Route::get('/registrar',[UsersController::class, 'create'])->name('users.create');
Route::post('/registrar',[UsersController::class, 'store'])->name('users.store');

