<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorDetailsController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers;
use App\Models\prescription;

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('patients', PatientsController::class);
Route::resource('patientsRecord', PatientRecordController::class);
Route::resource('doctors', DoctorController::class);
// Route::resource('prescription', PrescriptionController::class);
// Route::resource('Doctor/doctors', DoctorController::class);
// Route::prefix('Doctor')->group(function () {
// });

Route::get('addPatients', [PatientRecordController::class,'show'])->name('addPatients');
Route::get('reExamination', [PatientRecordController::class,'showReEx'])->name('reExamination');// X
Route::get('showPatients', [PatientsController::class,'show'])->name('showPatients');
Route::get('showExamined', [PatientRecordController::class,'showExamined'])->name('showExamined');
Route::get('showTransfered', [PatientRecordController::class,'showTransfered'])->name('showTransfered');
Route::get('showTodayRecords', [PatientRecordController::class,'showTodayRec'])->name('showTodayRec');
Route::get('patientsDocRecord/{id}', [DoctorController::class,'patientsDocRecord'])->name('patientsDocRecord');
Route::get('doctorDetails/{id}', [DoctorController::class,'show'])->name('doctorDetails');
Route::get('examinedDoctorRecords/{id}', [DoctorController::class,'examinedDocRecord'])->name('examinedDocRecord');
Route::get('doctorUpdate', [DoctorController::class,'update'])->name('doctorUpdate');
Route::get('deleteDoctor/{id}', [DoctorController::class,'destroy'])->name('deleteDoctor');

Route::get('patientDetails/{id}', [PatientsController::class,'showPatientDetails'])->name('patientDetails');
Route::get('patientRecDetails/{id}', [PatientRecordController::class,'showPatientRecDetails'])->name('patientRecDetails');
Route::get('editPatients/{id}', [PatientsController::class,'edit'])->name('editPatients');
Route::get('deletePatients/{id}', [PatientsController::class,'destroy'])->name('deletePatients');
Route::patch('patients/update/{id}', [PatientsController::class,'update'])->name('patients.update');
Route::get('info/{id}', [PrescriptionController::class,'showInfo'])->name('info');
Route::get('prescription/{id}', [PrescriptionController::class,'index'])->name('prescription');
Route::post('addPrescription', [PrescriptionController::class,'store'])->name('addPrescription');

Route::get('printInvoice/{id}', [PrescriptionController::class,'showInvoice'])->name('printInvoice');

Route::post('doctorProfile', [DoctorDetailsController::class,'store'])->name('doctorProfile');

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
