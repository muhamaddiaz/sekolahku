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
