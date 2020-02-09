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

// Contact
Route::get('/admin/contact', "ContactController@index");
Route::get('/admin/contact/create', "ContactController@create");
Route::get('/admin/contact/edit/{id}', "ContactController@edit");
Route::get('/admin/contact/delete/{id}', "ContactController@delete");
Route::post('/admin/contact/save', "ContactController@save");
Route::post('/admin/contact/update', "ContactController@update");

// Status
Route::get('/admin/status', "StatusController@index");
Route::get('/admin/status/create', "StatusController@create");
Route::get('/admin/status/edit/{id}', "StatusController@edit");
Route::get('/admin/status/delete/{id}', "StatusController@delete");
Route::post('/admin/status/save', "StatusController@save");
Route::post('/admin/status/update', "StatusController@update");

// Destination
Route::get('/admin/destination', "DestinationController@index");
Route::get('/admin/destination/create', "DestinationController@create");
Route::get('/admin/destination/edit/{id}', "DestinationController@edit");
Route::get('/admin/destination/delete/{id}', "DestinationController@delete");
Route::post('/admin/destination/save', "DestinationController@save");
Route::post('/admin/destination/update', "DestinationController@update");

// Locations
Route::get('/admin/location', "LocationController@index");
Route::get('/admin/location/create', "LocationController@create");
Route::get('/admin/location/edit/{id}', "LocationController@edit");
Route::get('/admin/location/delete/{id}', "LocationController@delete");
Route::post('/admin/location/save', "LocationController@save");
Route::post('/admin/location/update', "LocationController@update");

// Origin
Route::get('/admin/origin', "OriginController@index");
Route::get('/admin/origin/create', "OriginController@create");
Route::get('/admin/origin/edit/{id}', "OriginController@edit");
Route::get('/admin/origin/delete/{id}', "OriginController@delete");
Route::post('/admin/origin/save', "OriginController@save");
Route::post('/admin/origin/update', "OriginController@update");

// Industry
Route::get('/admin/industry', "IndustryController@index");
Route::get('/admin/industry/create', "IndustryController@create");
Route::get('/admin/industry/edit/{id}', "IndustryController@edit");
Route::get('/admin/industry/delete/{id}', "IndustryController@delete");
Route::post('/admin/industry/save', "IndustryController@save");
Route::post('/admin/industry/update', "IndustryController@update");

// Tracking
Route::get('/admin/tracking', "TrackingController@index");
Route::get('/admin/tracking/create', "TrackingController@create");
Route::get('/admin/tracking/edit/{id}', "TrackingController@edit");
Route::get('/admin/tracking/delete/{id}', "TrackingController@delete");
Route::post('/admin/tracking/save', "TrackingController@save");
Route::post('/admin/tracking/update', "TrackingController@update");
Route::get('admin/tracking/detail/{id}', 'TrackingController@detail');


// Choose US
Route::get('/admin/choose_us', "ChooseUsController@index");
Route::get('/admin/choose_us/create', "ChooseUsController@create");
Route::get('/admin/choose_us/edit/{id}', "ChooseUsController@edit");
Route::get('/admin/choose_us/delete/{id}', "ChooseUsController@delete");
Route::post('/admin/choose_us/save', "ChooseUsController@save");
Route::post('/admin/choose_us/update', "ChooseUsController@update");

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');