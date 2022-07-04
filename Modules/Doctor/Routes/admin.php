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


Route::prefix('doctor')->middleware('auth:admin')->group(function() {
    Route::get('doctors', 'DoctorController@index')->name('admin.show.doctors');
    Route::get('create-new-doctor', 'DoctorController@showCreateFrom')->name('admin.create.new.doctor');
    Route::post('store-new-doctor', 'DoctorController@store')->name('admin.store.new.doctor');
    Route::get('edit-doctor/{id}', 'DoctorController@showEditForm')->name('admin.show.edit.form.doctor');
    Route::post('update-edited-doctor/{id}', 'DoctorController@updateEditedDoctor')->name('admin.update.edited.doctor');
    Route::get('doctor-destroy/{id}', 'DoctorController@destroy')->name('admin.destroy.doctor');
    Route::get('doctor-times/{id}', 'DoctorController@getDoctorTimes')->name('admin.getDoctorTimes');

});

