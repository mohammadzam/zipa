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

Route::prefix('section')->middleware('auth:admin')->group(function() {
    Route::get('sections', 'SectionController@index')->name('admin.show.sections');
    Route::get('create-new-section', 'SectionController@showCreateFrom')->name('admin.create.new.section');
    Route::post('store-new-section', 'SectionController@store')->name('admin.store.new.section');
    Route::get('edit-section/{id}', 'SectionController@showEditForm')->name('admin.show.edit.form.section');
    Route::post('update-edited-section/{id}', 'SectionController@updateEditedDoctor')->name('admin.update.edited.section');
//    Route::get('section-destroy/{id}', 'SectionController@destroy')->name('admin.destroy.section');

});
