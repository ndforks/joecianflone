<?php

Route::get('/', 'HomeController@index');
Route::get('/stream/{type?}', 'HomeController@stream');
Route::get('/article/{slug}', 'HomeController@article');

Route::get('dbox', function() {
   //dd (getenv('DROPBOX_API_SECRET'));
   dd (Storage::disk('dropbox')->put('file.txt', 'Contents'));
});
