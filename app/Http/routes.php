<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'SearchController@index');
Route::get('/urls', 'KeywordUrlController@index');
Route::post('/keyword/urls', 'KeywordUrlController@saveUrls');
Route::get('/keyword/urls', 'KeywordUrlController@getUrls');
Route::get('/keyword/list', 'KeywordUrlController@getKeywords');


