<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CadAdministradorController;
use App\Http\Controllers\RevisoraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\QualidadeController;
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
Route::get('administradores/{item}/edit', [CadAdministradorController::class, 'edit'])->name('administradores.edit');
Route::put('administradores/{item}', [CadAdministradorController::class, 'editar'])->name('administradores.editar');
Route::delete('administradores/{item}', [CadAdministradorController::class, 'delete'])->name('administradores.delete');
Route::get('administradores/{item}/delete', [CadAdministradorController::class, 'modal'])->name('administradores.modal');

Route::get('revisoras', [RevisoraController::class, 'index'])->name('revisoras.index');
Route::post('revisoras', [RevisoraController::class, 'insert'])->name('revisoras.insert');
Route::get('revisoras/inserir', [RevisoraController::class, 'create'])->name('revisoras.inserir');
Route::get('revisoras/{item}/edit', [RevisoraController::class, 'edit'])->name('revisoras.edit');
Route::put('revisoras/{item}', [RevisoraController::class, 'editar'])->name('revisoras.editar');
Route::delete('revisoras/{item}', [RevisoraController::class, 'delete'])->name('revisoras.delete');
Route::get('revisoras/{item}/delete', [RevisoraController::class, 'modal'])->name('revisoras.modal');

Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::delete('usuarios/{item}', [UsuarioController::class, 'delete'])->name('usuarios.delete');
Route::get('usuarios/{item}/delete', [UsuarioController::class, 'modal'])->name('usuarios.modal');

Route::get('metas', [MetaController::class, 'index'])->name('metas.index');
Route::post('metas', [MetaController::class, 'insert'])->name('metas.insert');
Route::get('metas/inserir', [MetaController::class, 'create'])->name('metas.inserir');
Route::get('metas/{item}/edit', [MetaController::class, 'edit'])->name('metas.edit');
Route::put('metas/{item}', [MetaController::class, 'editar'])->name('metas.editar');
Route::delete('metas/{item}', [MetaController::class, 'delete'])->name('metas.delete');
Route::get('metas/{item}/delete', [MetaController::class, 'modal'])->name('metas.modal');

Route::get('qualidades', [QualidadeController::class, 'index'])->name('qualidades.index');
Route::post('qualidades', [QualidadeController::class, 'insert'])->name('qualidades.insert');
Route::get('qualidades/inserir', [QualidadeController::class, 'create'])->name('qualidades.inserir');
Route::get('qualidades/{item}/edit', [QualidadeController::class, 'edit'])->name('qualidades.edit');
Route::put('qualidades/{item}', [QualidadeController::class, 'editar'])->name('qualidades.editar');
Route::delete('qualidades/{item}', [QualidadeController::class, 'delete'])->name('qualidades.delete');
Route::get('qualidades/{item}/delete', [QualidadeController::class, 'modal'])->name('qualidades.modal');

Route::get('home-admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/', [UsuarioController::class, 'logout'])->name('usuarios.logout');
Route::put('admin/{usuario}', [AdminController::class, 'editar'])->name('admin.editar');