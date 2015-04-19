<?php

Route::get('/', ['as' => 'dashboard', function()
{
    return view('index');
}]);

Route::get('/posts', ['as' => 'posts', 'uses' => 'PostController@index']);

Route::match(['get', 'post'], '/posts2', ['as' => 'posts2', 'uses' => 'PostController@index2']);

Route::get('/posts/create', ['as' => 'post_create', 'uses' => 'PostController@create']);

Route::post('/posts/create', ['as' => 'post_store', 'uses' => 'PostController@store']);

Route::post('/posts/{slug}', ['as' => 'post_show', 'uses' => 'PostController@show']);