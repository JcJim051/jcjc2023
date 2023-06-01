<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConsultorController;
use App\Http\Controllers\Admin\CoordinatorController;
use App\Http\Controllers\Admin\SuperUserController;
use App\Http\Controllers\Admin\TellerController;
use App\Http\Controllers\Admin\ResultadosController;
use App\Http\Controllers\Admin\EscrutinioController;
use App\Http\Controllers\Admin\DescargasController;
use App\Http\Controllers\Admin\TestigosController;
use App\Http\Controllers\Admin\ConsultasController;
use App\Http\Controllers\Admin\VerpuestosController;
use App\Http\Controllers\Admin\AniController;
use App\Http\Controllers\Admin\RevisionController;
use App\Http\Controllers\Admin\PosesionController;
use App\Http\Controllers\Admin\AsistenciaController;



Route::get('', [AdminController::class, '__invoke'])->name('admin.home');

Route::resource('superusers', SuperUserController::class)->names('admin.superusers');


Route::resource('tellers', TellerController::class)->names('admin.tellers');

Route::resource('coordinators', CoordinatorController::class)->names('admin.coordinators');


Route::resource('consultors', ConsultorController::class)->names('admin.consultors');

Route::resource('resultados', ResultadosController::class)->names('admin.resultados');

Route::resource('escrutinio', EscrutinioController::class)->names('admin.escrutinio');

Route::resource('descargas', DescargasController::class)->names('admin.descargas');

Route::resource('testigos', TestigosController::class)->names('admin.testigos');


Route::resource('consultas', ConsultasController::class)->names('admin.consultas');

Route::resource('Verpuestos', VerpuestosController::class)->names('admin.verpuestos');

Route::resource('Ani', AniController::class)->names('admin.ani');

Route::resource('revision', RevisionController::class)->names('admin.revision');

Route::resource('posesion', PosesionController::class)->names('admin.posesion');

Route::resource('Asistencia', AsistenciaController::class)->names('admin.asistencia');
