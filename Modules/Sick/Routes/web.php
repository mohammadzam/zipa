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
use Modules\Sick\Http\Controllers\Sick\SigningController;

Route::prefix('sick')->group(function() {
    Route::get('sign-in', 'SigningController@index')->name('sick.show.sign.in.page');
    Route::post('signing-in', 'SigningController@signingIn')
        ->name('sick.signing-in');

    Route::get('sign-up', 'SigningController@ShowRegistrationPage')->name('sick.show.sign.up.page');
    Route::post('signing-up', 'SigningController@registration')
        ->name('sick.registration');
});
Route::prefix('sick')->middleware('auth:sick')->group(function() {
    Route::post('logout', 'DashboardController@Logout')->name('sick.logout');
    Route::get('/', 'DashboardController@index')->name('sick.show.dashboard');
    Route::get('my-information', 'SickController@index')->name('sick.show.my.information');
    Route::post('update-my-information', 'SickController@updateMyInformation')->name('sick.update.my.information');

});
Route::prefix('sick')->middleware('auth:sick')->group(function() {
    Route::get('medical-information-index', 'SickController@medicalInformationIndex')->name('sick.show.my.medical.information.index');
    Route::get('new-medical-file', 'SickController@newMedicalIFile')->name('sick.create.new.medical.file');
    Route::post('store-new-medical-file', 'SickController@storeNewMedicalFile')->name('sick.store.new.medical.file');
    Route::get('edit-medical-file/{id}', 'SickController@editMedicalIFileForm')->name('sick.show.edit.medical.file.form');
    Route::post('update-edited-medical-file/{id}', 'SickController@updateEditedMedicalFile')->name('sick.update.edited.medical.file');
    Route::get('medical-file-destroy/{id}', 'SickController@medicalFileDestroy')->name('sick.destroy.medical.file');
    Route::get('my-medical-information/{id}', 'SickController@medicalInformationInvoice')->name('sick.show.my.medical.information.invoice');
});
Route::prefix('sick')->middleware('auth:sick')->group(function() {
    Route::get('my-time', 'SickController@myTime')->name('sick.my.time');
    Route::get('create-new-reserve', 'SickController@showCreateNewReserveForm')->name('sick.create.new.reserve');
    Route::post('store-new-reserve', 'SickController@storeNewReserve')->name('sick.store.new.reserve');
    Route::get('reserve-destroy/{id}', 'SickController@destroy')->name('sick.destroy.reserve');
});
Route::prefix('sick')->middleware('auth:sick')->group(function() {
    Route::get('pay-price-of-doctor-visit/{id}/{sick}/{doctor}', 'SickController@PayPriceOfDoctorVisit')->name('sick.pay.price.of.doctor.visit');
    Route::post('pay-visit/{id}', 'SickController@payVisitAmount')->name('sick.pay.visit.amount');

    Route::get('pay-price-of-medical-operation/{id}', 'SickController@PayPriceOfMedicalOperation')->name('sick.pay.price.of.medical.operation');
    Route::post('pay-medical-operation/{id}', 'SickController@payMedicalOperationAmount')->name('sick.pay.medical.operation.amount');


    Route::get('my-payments-index', 'SickController@myPaymentsIndex')->name('sick.my.payments');

});
