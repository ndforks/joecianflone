<?php


Route::get('/', 'StreamController@index');
Route::get('/stream/{type?}', 'StreamController@stream');


Route::resource('contact', 'ContactController', [
   'only' => ['store']
]);

Route::get('/article/{slug}', 'ArticleController@article');
Route::get('/{pageName?}', 'PageController@index')->where('pageName', '.*');
