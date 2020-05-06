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



// Route::get('welcome', function () {
//     return view('welcome');
// });
// Route::get('home', function () {
//     return view('home');
// });
Route::resource('/user', 'UserController');
Route::get('/downloadPDF/{id}', 'UserController@downloadPDF')->name('PDF');

Route::get('/search','SearchController@search')->name('search');
Route::get('/action','SearchController@action')->name('action');


Route::get('/auto','AutoCompleteController@index');
Route::post('/show','AutoCompleteController@show')->name("show");

Route::resource('product', 'ProductController');

Route::get('multifile','MultiFileController@index');
Route::post('multifile','MultiFileController@upload')->name('upload');

Route::get('export', 'ExcelController@export')->name('export');
Route::get('importExportView', 'ExcelController@importExportView');
Route::post('import', 'ExcelController@import')->name('import');


// Route::get('/upload','UploadController@index');
// Route::post('/upload','UploadController@upload');
