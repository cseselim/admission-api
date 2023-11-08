<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::GET('/shift', [\App\Http\Controllers\API\shiftController::class, 'index'])->name('shift.index');
Route::POST('/shift', [\App\Http\Controllers\API\shiftController::class, 'store'])->name('shift.store');
Route::post('/shift/{id}', [\App\Http\Controllers\API\shiftController::class, 'update'])->name('shift.update');
Route::DELETE('/shift/{id}', [\App\Http\Controllers\API\shiftController::class, 'destroy'])->name('shift.destroy');

Route::get('/classes', [\App\Http\Controllers\API\ClassesController::class, 'index'])->name('classes.index');
Route::post('/classes', [\App\Http\Controllers\API\ClassesController::class, 'store'])->name('classes.store');
Route::post('/classes/{id}', [\App\Http\Controllers\API\ClassesController::class, 'update'])->name('classes.update');
Route::delete('/classes/{id}', [\App\Http\Controllers\API\ClassesController::class, 'destroy'])->name('classes.destroy');

Route::get('/admission-number', [\App\Http\Controllers\API\AdmissionNumberController::class, 'index'])->name('admission-number.index');
Route::post('/admission-number', [\App\Http\Controllers\API\AdmissionNumberController::class, 'store'])->name('admission-number.store');
Route::post('/admission-number/{id}', [\App\Http\Controllers\API\AdmissionNumberController::class, 'update'])->name('admission-number.update');
Route::delete('/admission-number/{id}', [\App\Http\Controllers\API\AdmissionNumberController::class, 'destroy'])->name('admission-number.destroy');

Route::get('/version', [\App\Http\Controllers\API\VersionController::class, 'index'])->name('version.index');
Route::post('/version', [\App\Http\Controllers\API\VersionController::class, 'store'])->name('version.store');
Route::post('/version/{id}', [\App\Http\Controllers\API\VersionController::class, 'update'])->name('version.update');
Route::delete('/version/{id}', [\App\Http\Controllers\API\VersionController::class, 'destroy'])->name('version.destroy');