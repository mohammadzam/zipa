<?php

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

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('surgery-costs', 'SurgeryCostsController@index')->name('admin.surgery.costs.index');
    Route::get('surgery-costs-invoice', 'SurgeryCostsController@invoice')->name('admin.surgery.costs.invoice');
    Route::get('section-surgery-costs-invoice/{id}', 'SurgeryCostsController@sectionSurgeryInvoice')->name('admin.sectionSurgeryInvoice');
});
Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('appointment-costs', 'AppointmentCostsController@index')->name('admin.appointment.costs.index');
    Route::get('appointment-costs-invoice', 'AppointmentCostsController@invoice')->name('admin.appointment.costs.invoice');
    Route::get('doctor-appointment-costs-invoice/{id}', 'AppointmentCostsController@doctorVisitsInvoice')->name('admin.doctorVisitsInvoice');
});
Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('shifts-costs', 'ShiftsCostsController@index')->name('admin.shifts.costs.index');
});
Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('final-profit', 'ProfitController@index')->name('admin.show.final.profit.index');
});
