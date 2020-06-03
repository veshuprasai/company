<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function ()
{
    // Only authenticated users may enter...
Route::get('/', function () {
    return view('welcome');
});

// Route list of company controller
Route::delete('company/{id}/delete', 'CompanyController@delete')->name('company.delete');
Route::get('company/trash', 'CompanyController@trash')->name('company.trash');
Route::get('company/{id}/restore', 'CompanyController@restore')->name('company.restore');
Route::resource('company', 'CompanyController');


// Route list of file controller
Route::delete('file/{id}/delete', 'FileController@delete')->name('file.delete');
Route::get('file/trash', 'FileController@trash')->name('file.trash');
Route::get('file/{id}/restore', 'FileController@restore')->name('file.restore');
Route::resource('file', 'FileController');


//search query fetch data and send to view

Route::any('/search', 'SearchController@search')->name('search');

});

Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


