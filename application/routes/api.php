<?php

/**
 * [DEPRECATED, GABISA DIPAKE COEK]
 * API Routes
 *
 * This routes only will be available under AJAX requests. This is ideal to build APIs.
 */

//Route API Auth
// Route::group('api/{version}/user/auth', function(){
// 	Route::post('login', 'Welcome@index');
// });

// Route::post('api/v1/user/auth/login', 'Welcome@index');
// Route::get('api/v1/tokens/csrf', 'Welcome@getToken');

static $API_VERSION = 'v1';


// Route::post("api/$API_VERSION/user/auth/login", "api/auth/v1/user/LoginUserAPI@tryLogin");

Route::group("api/$API_VERSION/product", function() use(&$API_VERSION){
	Route::post('/add', "api/products/$API_VERSION/admin/AddProductAPI@postData")->name("addProductAPI");
});


Route::group("api/$API_VERSION/user/", function() use(&$API_VERSION){
	Route::post('auth/login', "api/auth/$API_VERSION/user/LoginUserAPI@tryLogin")->name('auth_loginUser');
	Route::post('auth/register', "api/auth/$API_VERSION/user/RegisterUserAPI@register")->name('auth_registerUser');
});

Route::get('testApi/', 'Welcome@apiTestMiddleware', ['middleware' => 'UserAPIAccessMiddleware']);