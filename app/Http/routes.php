<?php

Route::get('/', 'HomeController@index');
Route::get('/stream/{type?}', 'HomeController@stream');
Route::get('/article/{slug}', 'HomeController@article');
