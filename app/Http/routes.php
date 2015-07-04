<?php

Route::get('/', 'HomeController@index');
Route::get('/stream/{type?}', 'HomeController@stream');
Route::get('/article/{slug}', 'HomeController@article');

Route::get('text', function() {
   $rawArticles = Storage::disk('dropbox')->files("articles");
   event(new JoeCianflone\Events\GotSomeArticles($rawArticles));
});
