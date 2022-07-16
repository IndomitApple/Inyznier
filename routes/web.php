<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/', 'App\Http\Controllers\FrontendController@index');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

Route::get('/new-appointment/{doctorId}/{date}', 'App\Http\Controllers\FrontendController@show')->name('create.appointment');



Route::group(['middleware'=>['auth','patient']],function(){
    Route::resource('/pet', PetController::class);
    Route::get('/my-booking', 'App\Http\Controllers\FrontendController@myBookings')->name('my.booking');
    Route::post('booking/appointment','App\Http\Controllers\FrontendController@store')->name('booking.appointment');

    Route::get('/user-profile', 'App\Http\Controllers\ProfileController@index');
    Route::post('/my-profile', 'App\Http\Controllers\ProfileController@store')->name('profile.store');
    Route::post('/profile-pic', 'App\Http\Controllers\ProfileController@profilePic')->name('profile.pic');

    Route::get('/my-prescription', 'App\Http\Controllers\FrontendController@myPrescription')->name('my.prescription');
});

Auth::routes();

Route::group(['middleware'=>['auth','admin']],function(){
    Route::resource('/doctor', DoctorController::class);
    Route::get('/patients', '\App\Http\Controllers\PatientlistController@index')->name('patient');
    Route::get('/patients/all', '\App\Http\Controllers\PatientlistController@allTimeAppointment')->name('all.appointments');
    Route::get('/status/update/{id}', '\App\Http\Controllers\PatientlistController@toggleStatus')->name('update.status');
    Route::resource('/breed', BreedController::class);
});

Route::group(['middleware'=>['auth','doctor']],function(){
    Route::resource('/appointment', AppointmentController::class);
    Route::post('/appointment/check','App\Http\Controllers\AppointmentController@check')->name('appointment.check');
    Route::post('/appointment/update','App\Http\Controllers\AppointmentController@updateTime')->name('update');

    Route::get('/patient-today','App\Http\Controllers\PrescriptionController@index')->name('patients.today');
    Route::get('/status/update/{id}', '\App\Http\Controllers\PrescriptionController@toggleStatus')->name('update.status');
    Route::post('/prescription','App\Http\Controllers\PrescriptionController@store')->name('prescription');
    Route::get('/prescription/{UserId}/{date}','App\Http\Controllers\PrescriptionController@show')->name('prescription.show');
    Route::get('/prescribed-patients','App\Http\Controllers\PrescriptionController@patientsFromPrescription')->name('prescribed.patients');
});
