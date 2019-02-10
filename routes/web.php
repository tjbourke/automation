<?php

Route::get('/', 'LEDController@index');

Route::get('/status', 'LEDController@status');

Route::post('/led', 'LEDController@store')->name('led');

