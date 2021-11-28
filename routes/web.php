<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
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
Route::get('/new-appointment/{doctorId}/{date}', 'App\Http\Controllers\FrontendController@show')->name('create.appointment');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

Route::post('booking/appointment','App\Http\Controllers\FrontendController@store')->name('booking.appointment')->middleware('auth');

Auth::routes();

Route::group(['middleware'=>['auth','admin']],function(){
    Route::resource('/doctor', DoctorController::class);
});

Route::group(['middleware'=>['auth','doctor']],function(){
    Route::resource('/appointment', AppointmentController::class);
    Route::post('/appointment/check','App\Http\Controllers\AppointmentController@check')->name('appointment.check');
    Route::post('/appointment/update','App\Http\Controllers\AppointmentController@updateTime')->name('update');
});
