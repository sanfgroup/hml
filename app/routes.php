<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as'=>'home', 'uses'=>'HomeController@getIndex'));
Route::get('/news', array('as'=>'news', 'uses'=>'HomeController@getNews'));
Route::get('/faq', array('as'=>'faq', 'uses'=>'HomeController@getFaq'));
Route::get('/marketing/line', array('as'=>'marketing.linear', 'uses'=>'HomeController@getLine'));
Route::get('/marketing/inv', array('as'=>'marketing.inv', 'uses'=>'HomeController@getInv'));
Route::get('/reviews', array('as'=>'reviews', 'uses'=>'HomeController@getReviews'));
Route::get('/contacts', array('as'=>'contacts', 'uses'=>'HomeController@getContacts'));
Route::get('/rulers', array('as'=>'rulers', 'uses'=>'HomeController@getRulers'));


Route::get('/user/registration', array('as'=>'user.reg', 'uses'=>'UserController@getRegistration'));
Route::post('/user/registration', array('uses'=>'UserController@postRegistration'));
Route::get('/user/login', array('as'=>'user.login', 'uses'=>'UserController@getLogin'));
Route::post('/user/login', array('uses'=>'UserController@postLogin'));

Route::get('/user/privat', array('as'=>'user.privat','uses'=>'UserController@getPrivat'));
Route::get('/user/logout', array('as'=>'user.logout','uses'=>'UserController@logout'));