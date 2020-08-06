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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', function(){
	return redirect()->route('dashboard');
})->name('home')->middleware('auth');
Route::get('/dashboard','HomeController@dashboard')->name('dashboard')->middleware('auth');
Route::POST('/settings/update','HomeController@update_settings')->name('settings.update')->middleware('auth');
Route::get('/website/create','HomeController@website_create')->name('website.create')->middleware('auth');

Route::POST('/website/store','HomeController@store')->name('website.store')->middleware('auth');

Route::get('/websites','HomeController@get_websites_api')->name('websites.get-api');
Route::get('/get_site_settings_api','HomeController@get_site_settings_api')->name('settings.get');

Route::get('/website/{id}/edit','HomeController@edit')->name('website.edit')->middleware('auth');
Route::POST('/website/update','HomeController@update')->name('website.update')->middleware('auth');
Route::POST('/website/remove_website','HomeController@remove_website')->name('website.remove')->middleware('auth');
Route::POST('/user/update_user_password','HomeController@update_user_password')->name('user.update-password')->middleware('auth');


Route::get('/terms', 'SettingsController@terms')->name('terms');
Route::get('/policy', 'SettingsController@policy')->name('policy');
Route::get('/terms_en', 'SettingsController@terms_en')->name('terms_en');
Route::get('/policy_en', 'SettingsController@policy_en')->name('policy_en');
