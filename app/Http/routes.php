<?php

Route::get('/', ['as' => 'dashboard', function()
{
    return view('index');
}]);

Route::get('/posts', ['as' => 'posts', function()
{
    return view('posts/index');
}]);

Route::get('/posts/create', ['as' => 'post_create', function()
{
    return view('posts/create');
}]);