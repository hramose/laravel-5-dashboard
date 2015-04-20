<?php

Route::get('/', ['as' => 'dashboard', function()
{
    return view('index');
}]);

Route::match(['get', 'post'], '/admin/posts', ['as' => 'posts_index', 'uses' => 'PostController@index']);

Route::get('/admin/posts/create', ['as' => 'post_create', 'uses' => 'PostController@create']);

Route::post('/admin/posts/create', ['as' => 'post_store', 'uses' => 'PostController@store']);

Route::get('/admin/posts/{slug}', ['as' => 'post_show', 'uses' => 'PostController@show']);