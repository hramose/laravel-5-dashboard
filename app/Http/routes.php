<?php
/* Dashboard */
Route::get('/admin', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

/* Posts */
Route::match(['get', 'post'], '/admin/posts', ['as' => 'posts_index', 'uses' => 'CMS\PostController@index']);
Route::get('/admin/posts/{id}/comments', ['as' => 'post_comments', 'uses' => 'CMS\PostController@comments']);
Route::get('/admin/posts/create', ['as' => 'post_create', 'uses' => 'CMS\PostController@create']);
Route::post('/admin/posts/create', ['as' => 'post_store', 'uses' => 'CMS\PostController@store']);
Route::get('/admin/posts/{id}', ['as' => 'post_show', 'uses' => 'CMS\PostController@show']);

/* Categories */
Route::match(['get', 'post'], '/admin/categories', ['as' => 'categories_index', 'uses' => 'CMS\CategoryController@index']);
Route::get('/admin/categories/{id}/entities/{type?}', ['as' => 'category_entities', 'uses' => 'CMS\CategoryController@entities']);
Route::get('/admin/categories/create', ['as' => 'category_create', 'uses' => 'CMS\CategoryController@create']);
Route::post('/admin/categories/create', ['as' => 'category_store', 'uses' => 'CMS\CategoryController@store']);
Route::get('/admin/categories/{id}', ['as' => 'category_show', 'uses' => 'CMS\CategoryController@show']);

/* Tags */
Route::match(['get', 'post'], '/admin/tags', ['as' => 'tags_index', 'uses' => 'CMS\TagController@index']);
Route::get('/admin/tags/{id}/entities/{type?}', ['as' => 'tag_entities', 'uses' => 'CMS\TagController@entities']);
Route::get('/admin/tags/create', ['as' => 'tag_create', 'uses' => 'CMS\TagController@create']);
Route::post('/admin/tags/create', ['as' => 'tag_store', 'uses' => 'CMS\TagController@store']);
Route::get('/admin/tags/{id}', ['as' => 'tag_show', 'uses' => 'CMS\TagController@show']);

/* Comments */
Route::match(['get', 'post'], '/admin/comments', ['as' => 'comments_index', 'uses' => 'CMS\CommentController@index']);
Route::get('/admin/comments/create', ['as' => 'comment_create', 'uses' => 'CMS\CommentController@create']);
Route::post('/admin/comments/create', ['as' => 'comment_store', 'uses' => 'CMS\CommentController@store']);
Route::get('/admin/comments/{id}', ['as' => 'comment_show', 'uses' => 'CMS\CommentController@show']);

/* Configurations */
Route::get('/admin/configurations', ['as' => 'configurations_index', 'uses' => 'ConfigurationController@index']);
Route::match(['get', 'post'], '/admin/configurations/manage', ['as' => 'configurations_manage', 'uses' => 'ConfigurationController@manage']);
Route::get('/admin/configurations/create', ['as' => 'configuration_create', 'uses' => 'ConfigurationController@create']);
Route::post('/admin/configurations/create', ['as' => 'configuration_store', 'uses' => 'ConfigurationController@store']);
Route::get('/admin/configurations/{id}', ['as' => 'configuration_show', 'uses' => 'ConfigurationController@show']);
