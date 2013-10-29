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
        Debugbar::info(Session::all());

        $data['news'] = News::orderBy('created_at', 'desc')->take(2)->get();
        return View::make('site.home', $data);
	}

	public function getNews() {
        $data['news'] = News::orderBy('created_at', 'desc')->paginate(10);
		return View::make('site.news', $data);
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
		return View::make('site.contacts');
	}

    public function getRulers() {
        return View::make('site.rulers');
    }
    public function privateLinear(){
        return View::make('site.private_inv');
    }
    public function privateInv(){
        return View::make('site.private_inv');
    }
}