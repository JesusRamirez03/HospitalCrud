<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\DiagnosticTestController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\BillController;

use App\Http\Controllers\Auth\UserAuthController;

use App\Http\Controllers\Auth\JwtAuthController;



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

// Hospital routes
Route::get('/hospitals', [HospitalController::class, 'index']);  // GET all hospitals
Route::post('/hospitals', [HospitalController::class, 'store']); // Create a new hospital
Route::get('/hospitals/{id}', [HospitalController::class, 'show']); // Get a specific hospital
Route::put('/hospitals/{id}', [HospitalController::class, 'update']); // Update a specific hospital
Route::delete('/hospitals/{id}', [HospitalController::class, 'destroy']); // Delete a specific hospital

// Doctor routes
Route::get('/doctors', [DoctorController::class, 'index']);  // GET all doctors
Route::post('/doctors', [DoctorController::class, 'store']); // Create a new doctor
Route::get('/doctors/{id}', [DoctorController::class, 'show']); // Get a specific doctor
Route::put('/doctors/{id}', [DoctorController::class, 'update']); // Update a specific doctor
Route::delete('/doctors/{id}', [DoctorController::class, 'destroy']); // Delete a specific doctor

// Patient routes
Route::get('/patients', [PatientController::class, 'index']);  // GET all patients
Route::post('/patients', [PatientController::class, 'store']); // Create a new patient
Route::get('/patients/{id}', [PatientController::class, 'show']); // Get a specific patient
Route::put('/patients/{id}', [PatientController::class, 'update']); // Update a specific patient
Route::delete('/patients/{id}', [PatientController::class, 'destroy']); // Delete a specific patient

// Specialty routes
Route::get('/specialties', [SpecialtyController::class, 'index']);  // GET all specialties
Route::post('/specialties', [SpecialtyController::class, 'store']); // Create a new specialty
Route::get('/specialties/{id}', [SpecialtyController::class, 'show']); // Get a specific specialty
Route::put('/specialties/{id}', [SpecialtyController::class, 'update']); // Update a specific specialty
Route::delete('/specialties/{id}', [SpecialtyController::class, 'destroy']); // Delete a specific specialty

// Appointment routes
Route::get('/appointments', [AppointmentController::class, 'index']);  // GET all appointments
Route::post('/appointments', [AppointmentController::class, 'store']); // Create a new appointment
Route::get('/appointments/{id}', [AppointmentController::class, 'show']); // Get a specific appointment
Route::put('/appointments/{id}', [AppointmentController::class, 'update']); // Update a specific appointment
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']); // Delete a specific appointment

// Room routes
Route::get('/rooms', [RoomController::class, 'index']);  // GET all rooms
Route::post('/rooms', [RoomController::class, 'store']); // Create a new room
Route::get('/rooms/{id}', [RoomController::class, 'show']); // Get a specific room
Route::put('/rooms/{id}', [RoomController::class, 'update']); // Update a specific room
Route::delete('/rooms/{id}', [RoomController::class, 'destroy']); // Delete a specific room

// Medication routes
Route::get('/medications', [MedicationController::class, 'index']);  // GET all medications
Route::post('/medications', [MedicationController::class, 'store']); // Create a new medication
Route::get('/medications/{id}', [MedicationController::class, 'show']); // Get a specific medication
Route::put('/medications/{id}', [MedicationController::class, 'update']); // Update a specific medication
Route::delete('/medications/{id}', [MedicationController::class, 'destroy']); // Delete a specific medication

// Diagnostic Test routes
Route::get('/diagnostic-tests', [DiagnosticTestController::class, 'index']);  // GET all diagnostic tests
Route::post('/diagnostic-tests', [DiagnosticTestController::class, 'store']); // Create a new diagnostic test
Route::get('/diagnostic-tests/{id}', [DiagnosticTestController::class, 'show']); // Get a specific diagnostic test
Route::put('/diagnostic-tests/{id}', [DiagnosticTestController::class, 'update']); // Update a specific diagnostic test
Route::delete('/diagnostic-tests/{id}', [DiagnosticTestController::class, 'destroy']); // Delete a specific diagnostic test

// Result routes
Route::get('/results', [ResultController::class, 'index']);  // GET all results
Route::post('/results', [ResultController::class, 'store']); // Create a new result
Route::get('/results/{id}', [ResultController::class, 'show']); // Get a specific result
Route::put('/results/{id}', [ResultController::class, 'update']); // Update a specific result
Route::delete('/results/{id}', [ResultController::class, 'destroy']); // Delete a specific result

// Bill routes
Route::get('/bills', [BillController::class, 'index']);  // GET all bills
Route::post('/bills', [BillController::class, 'store']); // Create a new bill
Route::get('/bills/{id}', [BillController::class, 'show']); // Get a specific bill
Route::put('/bills/{id}', [BillController::class, 'update']); // Update a specific bill
Route::delete('/bills/{id}', [BillController::class, 'destroy']); // Delete a specific bill

Route::post('/user/register', [UserAuthController::class, 'register']);
Route::post('/user/login', [UserAuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/user/logout', [UserAuthController::class, 'logout']);

Route::post('/jwt/register', [JwtAuthController::class, 'register']);
Route::post('/jwt/login', [JwtAuthController::class, 'login']);
Route::middleware('auth:jwt')->get('/jwt/profile', [JwtAuthController::class, 'userProfile']);
Route::middleware('auth:jwt')->post('/jwt/logout', [JwtAuthController::class, 'logout']);
