<?php

Route::get('/', ['as' => 'dashboard', function()
{
    return view('index');
}]);

/* Posts */
Route::match(['get', 'post'], '/admin/posts', ['as' => 'posts_index', 'uses' => 'PostController@index']);

Route::get('/admin/posts/create', ['as' => 'post_create', 'uses' => 'PostController@create']);

Route::post('/admin/posts/create', ['as' => 'post_store', 'uses' => 'PostController@store']);

Route::get('/admin/posts/{slug}', ['as' => 'post_show', 'uses' => 'PostController@show']);

/* Categories */
Route::match(['get', 'post'], '/admin/categories', ['as' => 'categories_index', 'uses' => 'CategoryController@index']);

Route::get('/admin/categories/create', ['as' => 'category_create', 'uses' => 'CategoryController@create']);

Route::post('/admin/categories/create', ['as' => 'category_store', 'uses' => 'CategoryController@store']);

Route::get('/admin/categories/{id}', ['as' => 'category_show', 'uses' => 'CategoryController@show']);

/* Tags */
Route::match(['get', 'post'], '/admin/tags', ['as' => 'tags_index', 'uses' => 'TagController@index']);

Route::get('/admin/tags/create', ['as' => 'tag_create', 'uses' => 'TagController@create']);

Route::post('/admin/tags/create', ['as' => 'tag_store', 'uses' => 'TagController@store']);

Route::get('/admin/tags/{id}', ['as' => 'tag_show', 'uses' => 'TagController@show']);
