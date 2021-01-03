<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CadAdministradorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', HomeController::class)->name('home');
Route::post('painel', [UsuarioController::class, 'login'])->name('usuarios.login');

Route::get('administradores', [CadAdministradorController::class, 'index'])->name('administradores.index');
Route::post('administradores', [CadAdministradorController::class, 'insert'])->name('administradores.insert');
Route::get('administradores/inserir', [CadAdministradorController::class, 'create'])->name('administradores.inserir');

Route::get('home-admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/', [UsuarioController::class, 'logout'])->name('usuarios.logout');
Route::put('admin/{usuario}', [AdminController::class, 'editar'])->name('admin.editar');