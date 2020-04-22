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


Route::get('/', 'Welcome@seeHome');

Route::set('404_override', function(){
    show_404();
});

Route::set('translate_uri_dashes',FALSE);

//Route::post("api/$API_VERSION/user/auth/login", "api/auth/$API_VERSION/user/LoginUserAPI@tryLogin");

Route::post("api/$API_VERSION/tokens/csrf", 'Welcome@getToken');

//TO DO
//Nested Route Group

//API AUTH (Account Related sama user)

// Route::group("api/$API_VERSION/user/", function() use(&$API_VERSION){
// 	Route::post('auth/login', "api/auth/$API_VERSION/user/LoginUserAPI@tryLogin")->name('auth_loginUser');
// 	Route::post('auth/register', "api/auth/$API_VERSION/user/RegisterUserAPI@register")->name('auth_registerUser');
// });


//Admin Route
Route::group("admin", function() use(&$API_VERSION){
	Route::get('/', "admin/Admin_Dashboard@index")->name('admin_dashboard');

	//Product Route
	Route::get('/product/add', "admin/Products/Admin_Add_Products@index")->name('admin_add_products');

	//User Route
	Route::group('/ewallet', function(){
		Route::get('/', "admin/E_Wallet/User_EWallet@index");
	});
});


//User Route
Route::group("user", function()use(&$API_VERSION){
	Route::group("register", function(){
		Route::get("/", "user/Register@index");
		Route::post("/doRegister", "user/Register@doRegister");
	});

	Route::group("login", function(){
		Route::get("/", "user/Login@index");
		Route::post("/doLogin", "user/Login@doLogin");
	});


});