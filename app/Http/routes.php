<?php

Route::get('/', 'StreamController@index')->name('home');

Route::group(['prefix' => 'stream'], function() {
   Route::get('', 'StreamController@stream');
   Route::get('articles', 'StreamController@articles')->name('stream.articles');
   Route::get('tweets', 'StreamController@tweets')->name('stream.tweets');
});

Route::resource('contact', 'ContactController', [
   'only' => ['store']
]);

Route::get('/article/{slug}', 'ArticleController@article');
Route::get('/{pageName?}', 'PageController@index')->where('pageName', '.*');
