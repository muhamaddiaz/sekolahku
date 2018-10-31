<?php

use App\Province;

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

Route::get('/', function () {
    return view('staticpages.index');
})->middleware('guest');

Route::resource('/user', 'UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ajax/province', function() {
    $provData = Province::all();
    return response()->json($provData);
});

Route::get('/ajax/{id}/city', function($id) {
    $prov = Province::findOrFail($id);
    $citiesData = $prov->getCities()->get();
    return response()->json($citiesData);
});

Route::prefix('/staff')->group(function() {
    Route::get('/pengajar', function() {
        return view('menu.staff.pelajar');
    })->name('staff.pengajar');
    Route::get('/pelajar', function() {
        return view('menu.staff.pengajar');
    })->name('staff.pelajar');
});

Route::prefix('/excel')->group(function() {
    Route::post('/import', 'ExcelController@import')->name('excel.import');
});
