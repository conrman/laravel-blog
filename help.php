<?php

/**
 * I am trying to create a 'sluggable' interface using
 * https://github.com/cviebrock/eloquent-sluggable
 */

// File: bootstrap/app.php
// Binding sluggable interface
$app->singleton(
    // Illuminate\Routing\Router::class, // this line breaks 
    \Cviebrock\EloquentSluggable\SluggableRouter::class
);

// File: app/Http/routes.php
// Routes configuration
Route::group(['middleware' => 'web'], function () {

    Route::auth();
    Route::get('/', 'PostsController@index');

    Route::resource('posts', 'PostsController');
    Route::get('tags/{tags}', 'TagsController@show');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('user/{user}/profile', 'UserController@profile');
    });
});

// File: config/app.php
// Including service provider
Cviebrock\EloquentSluggable\SluggableServiceProvider::class,