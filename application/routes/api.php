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
	Route::post('/addImage', "api/products/$API_VERSION/admin/AddProductAPI@postDataImage")->name("addProductAPIImage");
	Route::post('/delete', "api/products/$API_VERSION/admin/DeleteProductAPI@delete")->name("deleteProductAPI");
	Route::post('/edit', "api/products/$API_VERSION/admin/EditProductAPI@edit")->name("editProductAPI");
	Route::get('/list', "api/products/$API_VERSION/ListProduct@index")->name("listProductAPI");
});


Route::group("api/$API_VERSION/user/", function() use(&$API_VERSION){
	Route::post('auth/login', "api/auth/$API_VERSION/user/LoginUserAPI@tryLogin")->name('auth_loginUser');
	Route::post('auth/register', "api/auth/$API_VERSION/user/RegisterUserAPI@register")->name('auth_registerUser');


	/*
		Route untuk masalah pembayaran
		Middleware : 
			- UserAPIAccessMiddleware = Memastikan User memiliki akses token untuk melanjutkan permintaan, Jika tidak ada maka akan diinfokan untuk melakukan login ulang

			-EPaymentPINAuth = Melakukan autentikasi PIN yang user berikan, Jika salah maka akan kembali
	*/


	Route::get('ewallet/get_saldo', "api/e_wallet/$API_VERSION/user/EwalletProvider@getSaldo", ['middleware' => 'UserAPIAccessMiddleware']);

	Route::post('ewallet/do_trx', "api/e_wallet/$API_VERSION/user/EwalletProvider@getSaldo", ['middleware' => ['UserAPIAccessMiddleware', 'EPaymentPINAuth']]);

	Route::post('ewallet/change_pin', "api/e_wallet/$API_VERSION/user/EwalletProvider@changePIN", ['middleware' => ['UserAPIAccessMiddleware', 'EPaymentPINAuth']]);
});


Route::group("api/$API_VERSION/ewallet/", function() use(&$API_VERSION){
	Route::group("admin/",function() use(&$API_VERSION){
		Route::post('reload', "api/e_wallet/$API_VERSION/admin/EwalletReload@reloadWallet")->name('ewallet_reload');

	});
});


Route::get('testApi/', 'Welcome@apiTestMiddleware', ['middleware' => 'UserAPIAccessMiddleware']);