<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorDetailsController;
use App\Http\Controllers;

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('patients', PatientsController::class);
Route::resource('patientsRecord', PatientRecordController::class);
Route::resource('doctors', DoctorController::class);
// Route::resource('Doctor/doctors', DoctorController::class);
// Route::prefix('Doctor')->group(function () {
// });

Route::get('addPatients', [PatientRecordController::class,'show'])->name('addPatients');
Route::get('reExamination', [PatientRecordController::class,'showReEx'])->name('reExamination');// X

Route::get('showPatients', [PatientsController::class,'show'])->name('showPatients');
Route::get('patientDetails/{id}', [PatientsController::class,'showPatientDetails'])->name('patientDetails');
Route::get('editPatients/{id}', [PatientsController::class,'edit'])->name('editPatients');
Route::patch('patients/update/{id}', [PatientsController::class,'update'])->name('patients.update');

// Route::get('/Doctor/doctorDetails/{id}', [DoctorDetailsController::class,'edit']);

//flib status
Route::post('/toggle-status/{id}', [PatientRecordController::class, 'toggleStatus']);
Route::post('/toggle-status2/{id}', [DoctorController::class, 'toggleStatus']);
//flib status
// التحويلات
Route::patch('/transfereToDoctor/{id}', [PatientsController::class, 'transToDoctor'])->name('transfereToDoctor');
// التحويلات

//copy with you in all projects

Route::get('/{page}', 'App\Http\Controllers\AdminController@index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//with you in end  in all projects
