<?php

use App\Province;

Route::get('/', function () {
    return view('staticpages.index');
})->middleware('guest');

Auth::routes(['verify' => true]);

Route::resource('/user', 'UserController');
Auth::routes();

Route::get('/ajax/province', 'AjaxController@province');

Route::get('/ajax/{id}/city', 'AjaxController@city');

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('/staff')->group(function() {
        Route::get('/pengajar', 'StaffController@pengajar')->name('staff.pengajar');
        Route::get('/pelajar', 'StaffController@pelajar')->name('staff.pelajar');
        Route::get('/pengajar/table', 'StaffController@getPengajarTable')->name('staff.pengajar.table');
    });

    Route::prefix('/excel')->group(function() {
        Route::middleware('isAdmin')->group(function() {
            Route::post('/importGuru', 'ExcelController@importGuru')->name('excel.importPengajar');
            Route::post('/importSiswa', 'ExcelController@importSiswa')->name('excel.importPelajar');
        });
    });

    Route::name('main.')->group(function() {
        Route::get('/notification', 'MainController@notification')->name('notification');
        Route::delete('/notification/delete', 'MainController@notificationDelete')->name('notification.delete');
        Route::get('/elibrary', 'MainController@elibrary')->name('elibrary');
        Route::get('/emading', 'MainController@emading')->name('emading');
    });

    Route::resource('/kelas', 'KelasController');
    Route::resource('/forum', 'ForumController');
    Route::get('/classmates', 'KelasController@classMates')->name('classmates');
});
Route::get('/create_mading','MadingController@create')->name('create_mading');
Route::post('/store_mading','MadingController@store')->name('store_mading');
Route::get('/profile','UserController@show')->name('show_profile');
Route::get('/edit_profile_menu/{id}','UserController@edit')->name('edit_profile_menu');
Route::post('/edit_profile/{id}', 'UserController@update')->name('edit_profile');

