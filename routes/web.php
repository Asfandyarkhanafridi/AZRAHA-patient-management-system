<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PatientController;

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
    return view('auth/login');
});

Auth::routes();

Route::middleware('auth')->group(function () {

//Dashboard
Route::get('/', [HomeController::class, 'index'])->name('home');

//Users
Route::resource('users', UserController::class);

//Roles
Route::resource('role', RoleController::class);

//Profile
Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

//Patients
Route::resource('patients', PatientController::class);

Route::delete('medical_history', [PatientController::class, 'destroyMedicalHistories'])->name('medicalHistories.destroy');
Route::delete('current_medication', [PatientController::class, 'destroyCurrentMedications'])->name('currentMedications.destroy');

});
