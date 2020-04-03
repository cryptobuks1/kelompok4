<?php

/**
 * Welcome to Luthier-CI!
 *
 * This is your main route file. Put all your HTTP-Based routes here using the static
 * Route class methods
 *
 * Examples:
 *
 *    Route::get('foo', 'bar@baz');
 *      -> $route['foo']['GET'] = 'bar/baz';
 *
 *    Route::post('bar', 'baz@fobie', [ 'namespace' => 'cats' ]);
 *      -> $route['bar']['POST'] = 'cats/baz/foobie';
 *
 *    Route::get('blog/{slug}', 'blog@post');
 *      -> $route['blog/(:any)'] = 'blog/post/$1'
 */


//Define API Version 
static $API_VERSION = 'v1';


Route::get('/', 'Welcome@index');

Route::set('404_override', function(){
    show_404();
});

Route::set('translate_uri_dashes',FALSE);

//Route::post("api/$API_VERSION/user/auth/login", "api/auth/$API_VERSION/user/LoginUserAPI@tryLogin");

Route::post("api/$API_VERSION/tokens/csrf", 'Welcome@getToken');

//TO DO
//Nested Route Group

//API AUTH (Account Related sama user)

Route::group("api/$API_VERSION/user/", function() use(&$API_VERSION){
	Route::post('auth/login', "api/auth/$API_VERSION/user/LoginUserAPI@tryLogin")->name('auth_loginUser');
	Route::post('auth/register', "api/auth/$API_VERSION/user/RegisterUserAPI@register")->name('auth_registerUser');
});
