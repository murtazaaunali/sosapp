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

Route::get('/', 'ClientAuth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'employee'], function () {
    Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'EmployeeAuth\LoginController@login');
    Route::post('/logout', 'EmployeeAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'EmployeeAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'EmployeeAuth\RegisterController@register');
    
});

Route::group(['prefix' => 'client'], function () {
    Route::get('/login', 'ClientAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'ClientAuth\LoginController@login');
    Route::post('/logout', 'ClientAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'ClientAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'ClientAuth\RegisterController@register');

    Route::post('/password/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'ClientAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'ClientAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'franchisee'], function () {
    Route::get('/login', 'FranchiseeAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'FranchiseeAuth\LoginController@login');
    Route::post('/logout', 'FranchiseeAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'FranchiseeAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'FranchiseeAuth\RegisterController@register');

    Route::post('/password/email', 'FranchiseeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'FranchiseeAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'FranchiseeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'FranchiseeAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'client'], function () {
  Route::get('/login', 'ClientAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ClientAuth\LoginController@login');
  Route::post('/logout', 'ClientAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'ClientAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ClientAuth\RegisterController@register');

  Route::post('/password/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ClientAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ClientAuth\ResetPasswordController@showResetForm');
});
