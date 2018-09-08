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

Route::get('/', 'RecordsController@index');

Auth::routes();

Route::get('/record','RecordsController@add');
Route::post('/record','RecordsController@create');

Route::get('/list', 'RecordsController@list');
Route::get('/event', 'EventsController@event');
Route::get('/member', 'MembersController@member');

Route::get('/record/{record}','RecordsController@edit');
Route::post('/record/{record}','RecordsController@update');

Route::get('/newmember','MembersController@add');
Route::post('/newmember', 'MembersController@create');

Route::get('/newevent', 'EventsController@add');
Route::post('/newevent', 'EventsController@create');

Route::get('/event/{member}', 'EventsController@member');

Route::get('/member/{event}', 'MembersController@event');
