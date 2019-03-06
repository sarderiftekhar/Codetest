<?php

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/','TaskController@index')->name('index');
Route::post('/','TaskController@store');
