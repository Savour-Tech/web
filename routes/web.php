<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');

Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');

Route::get('/password/request', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('/password/request', 'Auth\SendsPasswordResetEmailController@sendResetLinkEmail')->name('password.email');
Route::post('/password/request-ajax', 'Auth\SendsPasswordResetEmailController@sendResetLinkEmailAjax');

Route::get('/home', 'UserController@index')->name('home');



/*
*CATERER
*/
Route::prefix('caterer')->group(function() {
	Route::get('/register', 'Caterer\Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'Caterer\Auth\RegisterController@register')->name('register');

	Route::get('/home', 'CatererController@index')->name('home');

	Route::get('/profile', 'Caterer\ProfileController@index');
	Route::post('/profile', 'Caterer\ProfileController@update');

	Route::get('/category', 'CatererController@showRegistrationForm');
	Route::get('/add-category', 'CatererController@register');


	Route::get('/chef', 'Caterer\ChefController@index');
	Route::get('/chef/cover', 'Caterer\ChefController@cover');
	Route::post('/chef/cover', 'Caterer\ChefController@coverStore');

	Route::get('/chef/menu', 'Caterer\ChefController@menu');
	Route::get('/chef/menu/create', 'Caterer\ChefController@menuCreate');
	Route::post('/chef/menu/create', 'Caterer\ChefController@menuStore');
	Route::get('/chef/menu/update/{id}', 'Caterer\ChefController@menuEdit');
	Route::post('/chef/menu/update/{id}', 'Caterer\ChefController@menuUpdate');
	Route::get('/chef/menu/delete/{id}', 'Caterer\ChefController@menuDestroy');

	Route::get('/chef/portfolio', 'Caterer\ChefController@portfolio');
	Route::get('/chef/portfolio/create', 'Caterer\ChefController@portfolioCreate');
	Route::post('/chef/portfolio/create', 'Caterer\ChefController@portfolioStore');
	Route::get('/chef/portfolio/update/{id}', 'Caterer\ChefController@portfolioEdit');
	Route::post('/chef/portfolio/update/{id}', 'Caterer\ChefController@portfolioUpdate');
	Route::get('/chef/portfolio/delete/{id}', 'Caterer\ChefController@portfolioDestroy');

});
	
