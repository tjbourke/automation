<?php

Route::get('/', 'LEDController@index');

Route::get('/status', 'LEDController@status');
Route::get('/led/{status}', 'LEDController@changeStatus');

Route::post('/led', 'LEDController@store')->name('led');

