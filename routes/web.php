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

Auth::routes();

Route::get('/home', 'PhonebookController@index')->name('home');
Route::get('/phonebook', 'PhonebookController@index')->name('phonebook');
Route::get('/state/get/{id}','StateController@getStates')->name('getState');

Route::post('/add_contact', 'PhonebookController@store')->name('add_contact');
Route::post('/edit/phonebook/{id}','PhonebookController@update')->name('updatePhonebook');
Route::get('/edit/phonebook/{id}','PhonebookController@edit')->name('editPhonebook');