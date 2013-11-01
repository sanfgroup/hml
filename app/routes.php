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
Route::get('/news/{id}',array('as'=>'news.detail', 'uses'=>'HomeController@getNewsDetail'));
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

Route::any('/pay/perfect', array('as'=>'pay.prefect','uses'=>'PayController@perfect'));
Route::any('/pay/perfect/out', array('as'=>'pay.prefect.out','uses'=>'PayController@perfectPay'));
Route::any('/pay/okpay', array('as'=>'pay.okpay','uses'=>'PayController@okpay'));
Route::any('/pay/okpay/out', array('as'=>'pay.okpay.out','uses'=>'PayController@okpayPay'));

Route::get('/user/linear/buy', array('as'=>'user.linear.buy','uses'=>'LinearController@buy'));

Route::get('/user/logout', array('as'=>'user.logout','uses'=>'UserController@logout'));Route::get('/user/logout', array('as'=>'user.logout','uses'=>'UserController@logout'));

Route::get('admin/news', array('as'=>'admin.news', 'uses'=>'Admin\NewsController@listNews'));
Route::any('admin/news/add', array('as'=>'admin.addNews','uses'=>'Admin\NewsController@addNews'));
Route::get('admin/news/{id}',array('as'=>'admin.new.detail', 'uses'=>'Admin\NewsController@detailNews'));


Route::get('private/inv', array('as'=>'private.inv', 'uses'=>'HomeController@privateInv'));
Route::get('private/linear', array('as'=>'private.linear', 'uses'=>'HomeController@privateLinear'));
Route::get('user/deposites', array('as'=>'user.deposites', 'uses'=>'HomeController@userDeposites'));
Route::any('user/review/add', array('as'=>'user.review.add', 'uses'=>'HomeController@user'));
Route::any('user/deposites/buy/{id}', array('as'=>'user.deposites.buy', 'uses'=>'InvController@buy'));
Route::any('user/review/add', array('as'=>'user.review.add', 'uses'=>'HomeController@userAddReview'));


Route::get('/cron/run/c68pd2s4e363221a3064e8807da20s1sf', function () {
    \Liebig\Cron\Cron::add('pay', '* * * * *', function() {
        Inv::process();
        return null;
    });
    $report = \Liebig\Cron\Cron::run();
});

