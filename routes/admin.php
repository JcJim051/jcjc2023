<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConsultorController;
use App\Http\Controllers\Admin\CoordinatorController;
use App\Http\Controllers\Admin\SuperUserController;
use App\Http\Controllers\Admin\TellerController;
use App\Http\Controllers\Admin\ResultadosController;
use App\Http\Controllers\Admin\EscrutinioController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\TestigosController;



Route::get('', [AdminController::class, '__invoke'])->name('admin.home');

Route::resource('superusers', SuperUserController::class)->names('admin.superusers');


Route::resource('tellers', TellerController::class)->names('admin.tellers');

Route::resource('coordinators', CoordinatorController::class)->names('admin.coordinators');


Route::resource('consultors', ConsultorController::class)->names('admin.consultors');

Route::resource('resultados', ResultadosController::class)->names('admin.resultados');

Route::resource('escrutinio', EscrutinioController::class)->names('admin.escrutinio');

Route::resource('usuarios', UsuariosController::class)->names('admin.usuarios');

Route::resource('testigos', TestigosController::class)->names('admin.testigos');
