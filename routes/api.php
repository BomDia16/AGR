<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\RequirementsController;
use App\Http\Controllers\SamplesController;
use App\Http\Controllers\UserController;
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

Route::apiResource('users', UserController::class);
Route::apiResource('requests', RequestsController::class);
Route::apiResource('records', RecordsController::class);
Route::apiResource('photos', PhotosController::class);
Route::apiResource('samples', SamplesController::class);
Route::apiResource('requisitos', RequirementsController::class);
Route::apiResource('documentos', DocumentsController::class);
