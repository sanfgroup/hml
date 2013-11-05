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
        $data['reviews'] = Reviews::paginate(10);
		return View::make('site.reviews', $data);
	}

	public function getContacts() {
		return View::make('site.contacts');
	}

    public function getRulers() {
        return View::make('site.rulers');
    }

    public function getHistory() {
        $data['h'] = $this->user->balance()->orderBy('id', 'desc')->paginate(10);
        return View::make('site.user.history', $data);
    }
    public function privateLinear(){
//        $data['user'] = $this->user;
        return View::make('site.private_linear');
    }
    public function privateInv(){
        $data['inv'] = Inv::all();
//        $data['user'] = $this->user;
        return View::make('site.private_inv', $data);
    }
    public function userDeposites(){
        $data['buys'] = $this->user->buys()->orderBy('id', 'desc')->paginate(10);
        return View::make('site.user.deposites', $data);
    }
    public function userAddReview(){
        if (Input::server("REQUEST_METHOD") == "POST") {
            $review = new Reviews();
            $review->user_id = $this->user->id;
            $review->content = INPUT::get('add_review');
            $review->save();
            return Redirect::route('reviews')->with('status', 'Вы успешно оставили комментарий');
        }
        return View::make('site.reviews_add');
    }
    public function getTime(){
        return print(date('{\h:H,\m:i,\s:s}'));
    }
}