<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[App\Http\Controllers\CustomAuthController::class,'login'])->name('login');
Route::get('registration',[App\Http\Controllers\CustomAuthController::class,'registration']);
Route::post('register-user',[App\Http\Controllers\CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('login-user',[App\Http\Controllers\CustomAuthController::class,'loginUser'])->name('login-user');
;

//Dashboard Controller
Route::middleware('auth')->group(function(){
    Route::get('dashboard',[App\Http\Controllers\DashboardController::class,'index']);
    //VisitorController
    Route::get('visitors',[App\Http\Controllers\VisitorController::class,'index'])->name('visitors');
    Route::get('visitors/create',[App\Http\Controllers\VisitorController::class,'create']);
    Route::post('visitors/create',[App\Http\Controllers\VisitorController::class,'store']);
    Route::get('visitors/{id}/edit',[App\Http\Controllers\VisitorController::class,'edit']);
    Route::get('visitors/{id}/status',[App\Http\Controllers\VisitorController::class,'status']);
    Route::post('visitors/{id}/status',[App\Http\Controllers\VisitorController::class,'statusUpdate']);
    Route::put('visitors/{id}/edit',[App\Http\Controllers\VisitorController::class,'update']);
    Route::get('visitors/{id}/delete',[App\Http\Controllers\VisitorController::class,'destroy']);
    Route::get('visitors/search',[App\Http\Controllers\VisitorController::class,'search']);

    //OfficeController
    Route::get('office',[App\Http\Controllers\OfficeController::class,'index']);
    Route::get('office/create',[App\Http\Controllers\OfficeController::class,'create']);
    Route::post('office/create',[App\Http\Controllers\OfficeController::class,'store']);
    Route::get('office/{id}/edit',[App\Http\Controllers\OfficeController::class,'edit']);
    Route::put('office/{id}/edit',[App\Http\Controllers\OfficeController::class,'update']);
    Route::get('office/{id}/delete',[App\Http\Controllers\OfficeController::class,'destroy']);
    Route::get('/search',[App\Http\Controllers\OfficeController::class,'search']);

    //PurposeOfVisit Controller
    Route::get('visitpurpose',[App\Http\Controllers\VisitPurposeController::class,'index']);
    Route::get('visitpurpose/create',[App\Http\Controllers\VisitPurposeController::class,'create']);
    Route::post('visitpurpose/create',[App\Http\Controllers\VisitPurposeController::class,'store']);
    Route::get('visitpurpose/{id}/edit',[App\Http\Controllers\VisitPurposeController::class,'edit']);
    Route::put('visitpurpose/{id}/edit',[App\Http\Controllers\VisitPurposeController::class,'update']);
    Route::get('visitpurpose/{id}/delete',[App\Http\Controllers\VisitPurposeController::class,'destroy']);
    Route::get('/search',[App\Http\Controllers\VisitPurposeController::class,'search']);

    //EmployeesController
    Route::get('employees',[App\Http\Controllers\EmployeesController::class,'index']);
    Route::get('employees/create',[App\Http\Controllers\EmployeesController::class,'create']);
    Route::post('employees/create',[App\Http\Controllers\EmployeesController::class,'store']);
    Route::get('employees/{id}/edit',[App\Http\Controllers\EmployeesController::class,'edit']);
    Route::put('employees/{id}/edit',[App\Http\Controllers\EmployeesController::class,'update']);
    Route::get('employees/{id}/delete',[App\Http\Controllers\EmployeesController::class,'destroy']);
    Route::get('/search',[App\Http\Controllers\EmployeesController::class,'search']);

});