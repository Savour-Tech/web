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
Route::get('caterer/register', 'Caterer\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('caterer/register', 'Caterer\Auth\RegisterController@register')->name('register');

Route::get('/caterer/home', 'CatererController@index')->name('home');
