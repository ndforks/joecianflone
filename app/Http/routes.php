<?php

Route::get('/', 'StreamController@index');
Route::get('/stream/{type?}', 'StreamController@stream');

Route::get('/article/{slug}', 'ArticleController@article');
Route::get('/{pageName?}', 'PageController@index');
