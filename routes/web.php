<?php

use App\Province;

Route::get('/', function () {
    return view('staticpages.index2');
})->middleware('guest');

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/ajax/province', 'AjaxController@province');

Route::get('/ajax/{id}/city', 'AjaxController@city');

Route::middleware('auth')->group(function() {
    Route::resource('/user', 'UserController');

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

    Route::resource('mading', 'MadingController');
    Route::resource('/kelas', 'KelasController');
    Route::resource('/forum', 'ForumController');
    Route::get('/classmates', 'KelasController@classMates')->name('classmates');
    //Route::middleware('verified')->group(function() {
        Route::get('/profile', 'UserController@profile')->name('user.profile');
    // });

    Route::get('/download/siswa', 'ExcelController@downloadSiswa')->name('excel.download.siswa');
    Route::get('/download/guru', 'ExcelController@downloadGuru')->name('excel.download.guru');

    Route::get('/export/guru', 'ExcelController@exportGuru')->name('excel.export.guru');

    Route::resource('/analytic', 'AnalyticController');
    Route::resource('/mapel', 'MapelController');
});

Route::post('/store_mading','MadingController@store')->name('store_mading');
Route::get('/edit_mading/{id}','MadingController@show')->name('edit_mading');
Route::post('/update_mading/{id}','MadingController@update')->name('update_mading');
Route::get('/destroy_mading/{id}','MadingController@destroy')->name('destroy_mading');
Route::get('/create_library','LibraryController@create')->name('create_library');
Route::post('/store_library','LibraryController@store')->name('store_library');
Route::get('/download_library/{id}','LibraryController@download')->name('download_libary');
Route::get('/delete_library/{id}','LibraryController@destroy')->name('delete_libary');
Route::get('/edit_library/{id}','LibraryController@edit')->name('edit_libary');
Route::post('/update_library/{id}','LibraryController@update')->name('update_library');
// Route::post('/report/{id}','ReportController@report')->name('report');