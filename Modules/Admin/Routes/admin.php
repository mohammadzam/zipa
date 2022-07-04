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

Route::prefix('admin')->group(function() {
    Route::get('sign-in', 'SigningController@index')->name('admin.show.sign.in.page');
    Route::post('signing-in', 'SigningController@signingIn')
        ->name('admin.signing-in');
});
Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::post('logout', 'DashboardController@Logout')->name('logout');
    Route::get('/', 'DashboardController@index')->name('admin.show.dashboard');


    Route::get('admins', 'AdminController@index')->name('admin.show.admins');
    Route::get('create-new-admin', 'AdminController@showCreateFrom')->name('admin.create.new.admin');
    Route::post('store-new-admin', 'AdminController@store')->name('admin.store.new.admin');
    Route::get('edit-admin/{id}', 'AdminController@showEditForm')->name('admin.show.edit.form.admin');
    Route::post('update-edited-admin/{id}', 'AdminController@updateEditedAdmin')->name('admin.update.edited.admin');
    Route::get('admin-destroy/{id}', 'AdminController@destroy')->name('admin.destroy.admin');

});
