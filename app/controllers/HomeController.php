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
        $data['reviews'] = Reviews::orderBy('id', 'desc')->paginate(10);
		return View::make('site.reviews', $data);
	}

	public function getContacts() {
        $data = array();
        $data['send']='<span></span>';
        if (Input::server("REQUEST_METHOD") == "POST") {
            $input = Input::all();
            $rules = array(
                'your_name' => 'Required|Min:3|Max:80',
                'your_email'=> 'Required|Between:3,64|Email'
            );
            $v = Validator::make($input, $rules);
            if ($v->passes()){
                $ticket = new Ticket();
                $ticket->name = Input::get('your_name');
                $data['name'] = Input::get('your_name');
                $ticket->email = Input::get('your_email');
                $data['email'] = Input::get('your_email');
                $ticket->item = Input::get('item');
                $data['item'] = Input::get('item');
                $ticket->message = Input::get('message');
                $data['message1'] = Input::get('message');
                $ticket->thread = 0;
                $ticket->thwrite = 0;
                $ticket->save();
                Mail::send('emails.tickets', $data, function($message) use ($data)
                {
                    $message->to('support@myhappylines.com', $data['name'])->subject('Поддержка '.$data['item']);
                });
                return Redirect::back()->with('okgood', 'Вы успешно отправили письмо!');
            }
            else{
                return Redirect::back()->withInput()
                    ->withErrors($v->errors())->with('okgood', 'Вы не успешно отправили письмо!');;
            }
        }
		return View::make('site.contacts', $data);
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
        $data['give'] = $this->user->balance()->whereType(1)->sum('summa');
        $data['balance'] = $this->user->balance;
        $data['buys'] = $this->user->buys()->where('col', '<', '8')->count();
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
            $review->content = strip_tags(INPUT::get('add_review'));
            $review->save();
            return Redirect::route('reviews')->with('status', 'Вы успешно оставили комментарий');
        }
        return View::make('site.reviews_add');
    }
    public function getTime(){
        return print(date('{\h:H,\m:i,\s:s}'));
    }

}