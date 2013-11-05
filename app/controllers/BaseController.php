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
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
        $this->user = null;
        if(!Auth::guest()) {
            $this->user = Auth::user();
            $uid = $this->user->id;
            $pay = $this->user->pay;
            View::composer('site.private_header', function($view) use($uid, $pay)
            {
                $data = array();
                if(!Auth::guest()) {
                    $pm = new PerfectMoney();
                    $data['form'] = $pm->form($uid, $pay);
                    $ok = new OkPay();
                    $data['form2'] = $ok->form($uid, $pay);
                }
                $view->with($data);
            });
            View::share('user', $this->user);
        }
	}

}