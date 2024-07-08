<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\FormationsController;
use App\Http\Controllers\VoituresController;
use App\Http\Controllers\ExamensController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PermisController;

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

Route::apiResource('agence', AgenceController::class);
Route::apiResource('personnels', PersonnelsController::class);
Route::apiResource('salles', SallesController::class);
Route::apiResource('formations', FormationsController::class);
Route::apiResource('voitures', VoituresController::class);
Route::apiResource('examens', ExamensController::class);
Route::apiResource('clients', ClientsController::class);
Route::apiResource('permis', PermisController::class);
