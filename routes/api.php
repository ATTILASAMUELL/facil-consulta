<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CitiesController,UserController,DoctorController,PatientController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::post('/medicos', [DoctorController::class, 'create']);
    Route::get('/medicos/{id_doctor}/pacientes', [DoctorController::class, 'findWithPatient']);
    Route::post('/medicos/{id_doctor}/pacientes', [DoctorController::class, 'linkPatientAndDoctor']);
    Route::post('/pacientes', [PatientController::class, 'create']);
    Route::put('/pacientes/{id_patient}', [PatientController::class, 'update']);
});

Route::post('/login', [UserController::class, 'login']);
Route::get('/cidades', [CitiesController::class, 'get']);
Route::get('/medicos', [DoctorController::class, 'get']);
Route::get('/cidades/{id_cities}/medicos', [DoctorController::class, 'find']);



