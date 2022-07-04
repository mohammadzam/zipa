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

Route::prefix('admin/sick')->middleware('auth:admin')->group(function() {
    Route::get('sicks', 'SickController@index')->name('admin.show.sicks');
    Route::get('show-medical-information/{id}', 'SickController@showMedicalInformation')->name('admin.show.sick.medical.information');
    Route::get('edit-sick-information/{id}', 'SickController@showEditForm')->name('admin.show.edit.form.sick');
    Route::post('update-edited-information/{id}', 'SickController@updateEditedInformation')->name('admin.update.edited.sick.information');
    Route::get('reserves-times', 'SickController@reservesTimes')->name('admin.sick.show.reserves.times');
    Route::get('medical-information-invoice/{id}', 'SickController@medicalInformationInvoice')->name('admin.show.sick.medical.information.invoice');

});
