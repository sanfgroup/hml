<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex() {
        $data['news'] = News::take(2)->get();
        Debugbar::info($data);
        Debugbar::info("ASd");
        return View::make('site.home', $data);
	}

	public function getNews() {
		return View::make('site.news');
	}

	public function getFaq() {
		return View::make('site.faq');
	}

	public function getLine() {
		return View::make('site.marketing_line');
	}

	public function getInv() {
		return View::make('site.marketing_inv');
	}

	public function getReviews() {
		return View::make('site.reviews');
	}

	public function getContacts() {
		return View::make('site.reviews');
	}

}