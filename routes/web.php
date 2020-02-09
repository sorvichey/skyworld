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
Route::get('/',  'FrontController@index');
Route::get('/dashboard',  'DashboardController@index');
Route::get('contact-us', 'FrontController@contact');
Route::get('about-us', 'FrontController@about');
Route::get('drink', 'FrontController@product');
Route::get('drink/{id}', 'FrontController@product_detail');
Route::get('shop', 'FrontController@shop');
Route::get('shop/{id}', 'FrontController@shop_detail');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


Route::get('/role', 'RoleController@index');
Route::get('role/create', 'RoleController@create');
Route::get('role/edit/{id}', 'RoleController@edit');
Route::get('role/delete/{id}', 'RoleController@delete');
Route::post('role/save', 'RoleController@save');
Route::post('role/update', 'RoleController@update');
Route::get('/role/permission/{id}', "PermissionController@index");
Route::post('/rolepermission/save', "PermissionController@save");

Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('user/save', 'UserController@save');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::post('/user/update', 'UserController@update');

// social
Route::get('/admin/social', "SocialController@index");
Route::get('/admin/social/create', "SocialController@create");
Route::get('/admin/social/edit/{id}', "SocialController@edit");
Route::get('/admin/social/delete/{id}', "SocialController@delete");
Route::post('/admin/social/save', "SocialController@save");
Route::post('/admin/social/update', "SocialController@update");
// slide
Route::get('/admin/slide', "SlideController@index");
Route::get('/admin/slide/create', "SlideController@create");
Route::get('/admin/slide/edit/{id}', "SlideController@edit");
Route::get('/admin/slide/delete/{id}', "SlideController@delete");
Route::post('/admin/slide/save', "SlideController@save");
Route::post('/admin/slide/update', "SlideController@update");

// page
Route::get('/admin/page', "PageController@index");
Route::get('/admin/page/create', "PageController@create");
Route::get('/admin/page/edit/{id}', "PageController@edit");
Route::get('/admin/page/delete/{id}', "PageController@delete");
Route::post('/admin/page/save', "PageController@save");
Route::post('/admin/page/update', "PageController@update");


// menu
Route::get('/admin/menu', "MenuController@index");
Route::get('/admin/menu/create', "MenuController@create");
Route::post('/admin/menu/save', "MenuController@save");
Route::get('/admin/menu/edit/{id}', "MenuController@edit");
Route::post('/admin/menu/update', "MenuController@update");
Route::get('/admin/menu/delete/{id}',"MenuController@delete");

// introduction page
Route::get('/admin/intropage', "IntroductionPageController@index");
Route::get('/admin/intropage/create', "IntroductionPageController@create");
Route::post('/admin/intropage/save', "IntroductionPageController@save");
Route::get('/admin/intropage/edit/{id}', "IntroductionPageController@edit");
Route::post('/admin/intropage/update', "IntroductionPageController@update");
Route::get('/admin/intropage/delete/{id}',"IntroductionPageController@delete");

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');