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
Route::prefix('doctor')->group(function() {
    Route::get('sign-in', 'SigningController@index')->name('doctor.show.sign.in.page');
    Route::post('signing-in', 'SigningController@signingIn')
        ->name('doctor.signing-in');
});
Route::prefix('doctor')->middleware('auth:doctor')->group(function() {
    Route::post('logout', 'DashboardController@Logout')->name('doctor.logout');
    Route::get('/', 'DashboardController@index')->name('doctor.show.dashboard');
    Route::get('my-information', 'DoctorController@index')->name('doctor.show.my.information');
    Route::post('update-my-information', 'DoctorController@updateMyInformation')->name('doctor.update.my.information');
});
Route::prefix('doctor')->middleware('auth:doctor')->group(function() {
    Route::get('my-work-plan', 'DoctorController@getMyWorkPlan')->name('doctor.getMyWorkPlan');
    Route::get('create-new-time', 'DoctorController@showCreateNewTimeForm')->name('doctor.show.create.new.time.form');
    Route::post('store-new-time', 'DoctorController@storeNewTime')->name('doctor.store.new.time');
    Route::get('my-visits', 'DoctorController@getMyVisit')->name('doctor.getMyVisits');
    Route::get('my-sicks', 'DoctorController@getMySicks')->name('doctor.getMySicks');
    Route::post('update-sick-status/{id}', 'DoctorController@updateSickStatus')->name('doctor.update.sick.status');

});
Route::prefix('doctor')->middleware('auth:doctor')->group(function() {
    Route::get('my-salary-receipt-choose-date', 'DoctorController@showSelectRangeDatePage')->name('doctor.showSelectRangeDatePage');
    Route::get('my-salary-receipt', 'DoctorController@showMySalaryReceipt')->name('doctor.showMySalaryReceipt');



});
