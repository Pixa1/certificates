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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PagesController@index');




Route::get('/create','CertificatesController@create');
Route::post('/create','CertificatesController@store');

Route::get('/edit/{id}','CertificatesController@edit');
Route::post('/edit/{id}','CertificatesController@update');

Route::post('/delete/{id}','CertificatesController@destroy');

// Route::get('/admin','AdminController@index');
// Route::get('/admin/edit/{id}','AdminController@edit');
// Route::post('/admin/edit/{id}','AdminController@update');
// Route::post('/admin/delete/{id}','AdminController@destroy');
// Route::get('/admin/create','AdminController@create');
// Route::post('admin/create','AdminController@store');

Route::resource('admin','AdminController');
Route::resource('permissions','PermissionController');
Route::resource('roles','RoleController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
