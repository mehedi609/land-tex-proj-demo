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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
  return view('backend.dashboard');
})->name('dashboard');

//Area Route
Route::resource('areas', 'AreaController');
/*Route::get('areas', 'AreaController@index')->name('areas.index');
Route::post('areas', 'AreaController@store')->name('areas.store');
Route::get('areas/create', 'AreaController@create')->name('areas.create');
Route::put('areas/{area}', 'AreaController@update')->name('areas.update');
Route::delete('areas/create', 'AreaController@destroy')->name('areas.destroy');
Route::put('areas/{area}/edit', 'AreaController@edit')->name('areas.edit');*/

//Plot Route
Route::resource('plots', 'PlotController');
Route::get('getplots/{id}', 'PlotController@getPlotsByAreaId')->name('plots.getplots');

// Flat Route
Route::resource('flats', 'FlatController');
Route::get('getflats/{id}', 'FlatController@getFlatsByPlotId')->name('flats.getflats');

//LandOwner Route
Route::resource('landowners', 'LandOwnerController');

// FlatOwner Route
Route::resource('flat-owners', 'FlatOwnerController');

// Preview Route
Route::get('preview', 'PreviewController@index')->name('preview.index');
Route::post('preview', 'PreviewController@getData')->name('preview.get-data');
Route::get('show', 'PreviewController@show')->name('preview.show');

