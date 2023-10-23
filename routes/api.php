<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\MateriasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/alumnos')->group(function () {
    Route::get('/',[AlumnoController::class,'index']);
    Route::get('/{id}',[AlumnoController::class,'show']);
    Route::post('/',[AlumnoController::class,'store']);
    Route::put('/{id}',[AlumnoController::class,'update']);
    Route::delete('/{id}',[AlumnoController::class,'destroy']);
});

Route::prefix('/asistencias')->group(function () {
    Route::get('/',[AsistenciaController::class,'index']);
    Route::get('/{id}',[AsistenciaController::class,'show']);
    Route::post('/',[AsistenciaController::class,'store']);
    Route::put('/{id}',[AsistenciaController::class,'update']);
    Route::delete('/{id}',[AsistenciaController::class,'destroy']);
});

Route::prefix('/cursos')->group(function () {
    Route::get('/',[CursoController::class,'index']);
    Route::get('/{id}',[CursoController::class,'show']);
    Route::post('/',[CursoController::class,'store']);
    Route::put('/{id}',[CursoController::class,'update']);
    Route::delete('/{id}',[CursoController::class,'destroy']);
});

Route::prefix('/maestros')->group(function () {
    Route::get('/',[MaestroController::class,'index']);
    Route::get('/{id}',[MaestroController::class,'show']);
    Route::post('/',[MaestroController::class,'store']);
    Route::put('/{id}',[MaestroController::class,'update']);
    Route::delete('/{id}',[MaestroController::class,'destroy']);
});

Route::prefix('/materias')->group(function () {
    Route::get('/',[MateriasController::class,'index']);
    Route::get('/{id}',[MateriasController::class,'show']);
    Route::post('/',[MateriasController::class,'store']);
    Route::put('/{id}',[MateriasController::class,'update']);
    Route::delete('/{id}',[MateriasController::class,'destroy']);
});

