<?php

use Illuminate\Support\Facades\Route;

Route::get('/libro', 'LibroController@index');

Route::post('/libro', 'LibroController@store');

Route::delete('/libro/{id}', 'LibroController@destroy');

Route::get('/libro/{id}', 'LibroController@edit');

Route::post('/libro/update', 'LibroController@update');