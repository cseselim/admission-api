<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Session;

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

Route::post('/change-password', [\App\Http\Controllers\API\UserController::class, 'changePasswordSave'])->name('postChangePassword');

Route::GET('/applicant-student-count', [\App\Http\Controllers\API\DashboardController::class, 'applicantStudentCount'])->name('dashboard.applicantStudentCount');


Route::GET('/schools', [\App\Http\Controllers\API\SchoolController::class, 'index'])->name('school.index');
Route::GET('/parents', [\App\Http\Controllers\API\SchoolController::class, 'parents'])->name('school.parents');
Route::POST('/school', [\App\Http\Controllers\API\SchoolController::class, 'store'])->name('school.store');
Route::get('/school/{id}', [\App\Http\Controllers\API\SchoolController::class, 'show'])->name('school.show');
Route::post('/school/{id}', [\App\Http\Controllers\API\SchoolController::class, 'update'])->name('school.update');
Route::DELETE('/school/{id}', [\App\Http\Controllers\API\SchoolController::class, 'destroy'])->name('school.destroy');

Route::GET('/shift', [\App\Http\Controllers\API\shiftController::class, 'index'])->name('shift.index');
Route::POST('/shift', [\App\Http\Controllers\API\shiftController::class, 'store'])->name('shift.store');
Route::get('/shift/{id}', [\App\Http\Controllers\API\shiftController::class, 'edit'])->name('classes.edit');
Route::post('/shift/{id}', [\App\Http\Controllers\API\shiftController::class, 'update'])->name('shift.update');
Route::DELETE('/shift/{id}', [\App\Http\Controllers\API\shiftController::class, 'destroy'])->name('shift.destroy');

Route::get('/classes', [\App\Http\Controllers\API\ClassesController::class, 'index'])->name('classes.index');
Route::post('/classes', [\App\Http\Controllers\API\ClassesController::class, 'store'])->name('classes.store');
Route::get('/classes/{id}', [\App\Http\Controllers\API\ClassesController::class, 'show'])->name('classes.show');
Route::post('/classes/{id}', [\App\Http\Controllers\API\ClassesController::class, 'update'])->name('classes.update');
Route::delete('/classes/{id}', [\App\Http\Controllers\API\ClassesController::class, 'destroy'])->name('classes.destroy');

Route::get('/admission-number', [\App\Http\Controllers\API\AdmissionNumberController::class, 'index'])->name('admission-number.index');
Route::post('/admission-number', [\App\Http\Controllers\API\AdmissionNumberController::class, 'store'])->name('admission-number.store');
Route::post('/admission-number/{id}', [\App\Http\Controllers\API\AdmissionNumberController::class, 'update'])->name('admission-number.update');
Route::delete('/admission-number/{id}', [\App\Http\Controllers\API\AdmissionNumberController::class, 'destroy'])->name('admission-number.destroy');

Route::get('/version', [\App\Http\Controllers\API\VersionController::class, 'index'])->name('version.index');
Route::post('/version', [\App\Http\Controllers\API\VersionController::class, 'store'])->name('version.store');
Route::get('/version/{id}', [\App\Http\Controllers\API\VersionController::class, 'edit'])->name('version.edit');
Route::post('/version/{id}', [\App\Http\Controllers\API\VersionController::class, 'update'])->name('version.update');
Route::delete('/version/{id}', [\App\Http\Controllers\API\VersionController::class, 'destroy'])->name('version.destroy');

Route::get('/payment-gateway', [\App\Http\Controllers\API\PaymentGatewayController::class, 'index'])->name('payment-gateway.index');
Route::post('/payment-gateway', [\App\Http\Controllers\API\PaymentGatewayController::class, 'store'])->name('payment-gateway.store');
Route::get('/payment-gateway/{id}', [\App\Http\Controllers\API\PaymentGatewayController::class, 'show'])->name('payment-gateway.show');
Route::post('/payment-gateway/{id}', [\App\Http\Controllers\API\PaymentGatewayController::class, 'update'])->name('payment-gateway.update');
Route::delete('/payment-gateway/{id}', [\App\Http\Controllers\API\PaymentGatewayController::class, 'destroy'])->name('payment-gateway.destroy');

Route::get('/student-profiles', [\App\Http\Controllers\API\StudentProfileController::class, 'index'])->name('student-profile.index');
Route::post('/student-profile', [\App\Http\Controllers\API\StudentProfileController::class, 'store'])->name('student-profile.store');
Route::get('/student-profile/{id}', [\App\Http\Controllers\API\StudentProfileController::class, 'show'])->name('student-profile.show');
Route::post('/student-profile/{id}', [\App\Http\Controllers\API\StudentProfileController::class, 'update'])->name('student-profile.update');
Route::delete('/student-profile/{id}', [\App\Http\Controllers\API\StudentProfileController::class, 'destroy'])->name('student-profile.destroy');

Route::get('/applicant-student', [\App\Http\Controllers\API\StudentApplicationController::class, 'index'])->name('applicant-student.index');
Route::post('/student-application', [\App\Http\Controllers\API\StudentApplicationController::class, 'store'])->name('student-application.store');
Route::get('/applicant-student/{id}', [\App\Http\Controllers\API\StudentApplicationController::class, 'show'])->name('applicant-student.show');
Route::get('/payment-pending-students', [\App\Http\Controllers\API\StudentApplicationController::class, 'paymentPendingStudents'])->name('applicant-student.paymentPendingStudents');
Route::get('/applicant-student-approve/{id}', [\App\Http\Controllers\API\StudentApplicationController::class, 'applicantStudentApprove'])->name('applicant-student.applicantStudentApprove');
Route::get('/selected-student', [\App\Http\Controllers\API\StudentApplicationController::class, 'selectedStudent'])->name('applicant-student.selectedStudent');
Route::get('/selected-student-disapprove/{id}', [\App\Http\Controllers\API\StudentApplicationController::class, 'applicantStudentDisapprove'])->name('applicant-student.applicantStudentDisapprove');


Route::post('/ssl-payment', [\App\Http\Controllers\API\PaymentController::class, 'payment']);
Route::post('/success', [\App\Http\Controllers\API\PaymentController::class, 'success']);
Route::post('/fail', [\App\Http\Controllers\API\PaymentController::class, 'fail']);
Route::post('/cancel', [\App\Http\Controllers\API\PaymentController::class, 'cancel']);
Route::post('/abc', function (){
    dd(Session::get('applicantInfo'));
});
