<?php

class BaseController extends Controller {

    public $user;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{


        View::share('user', $this->user);
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
        $this->user = null;
        if(!Auth::guest()) {
            $this->user = Auth::user();
            $uid = $this->user->id;
            $uname = $this->user->username;
            $pay = $this->user->pay;
            View::share('user', $this->user);
        }
	}

}