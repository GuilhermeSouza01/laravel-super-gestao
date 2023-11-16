<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreController;
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

Route::get('/', [PrincipalController::class, 'index'])->name('site.index');
Route::get('/sobre', [SobreController::class, 'index'])->name('site.sobre');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function () {
    return "Login";
})->name('site.login');

// Group routes on /app

Route::prefix('/app')->group(function () {


    Route::get('/clientes', function () {
        return "clientes";
    })->name('app.clientes');
    Route::get('/fornecedores', function () {
        return "fornecedores";
    })->name('app.fornecedores');
    Route::get('/produtos', function () {
        return "produtos";
    })->name('app.produtos');
});
