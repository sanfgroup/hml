<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|---------------------------- ----------------------------------------------
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
    public function getNewsDetail($id){
        $data['post'] = News::find($id);
        return View::make('site.news_detail', $data);
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

    public function getHistory() {
        $data['h'] = Auth::user()->balance()->orderBy('id', 'desc')->paginate(10);
        return View::make('site.user.history', $data);
    }
    public function privateLinear(){
        return View::make('site.private_linear');
    }
    public function privateInv(){
        return View::make('site.private_inv');
    }
    public function userDeposites(){
        $data['buys'] = Auth::user()->buys()->orderBy('id', 'desc')->paginate(10);
        return View::make('site.user.deposites', $data);
    }
    public function userAddReview(){
        if (Input::server("REQUEST_METHOD") == "POST") {
            $review = new Reviews();
            $review->user_id = Auth::user()->id;
            $review->content = INPUT::get('add_review');
            $review->save();
            return Redirect::route('reviews');
        }
        return View::make('site.reviews_add');
    }
}