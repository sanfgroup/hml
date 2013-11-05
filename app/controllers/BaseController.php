<?php

class BaseController extends Controller {

    protected $user;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{

        $this->user = null;
        if(!Auth::guest()) {
            $this->user = Auth::user();
        }

        View::share('user', $this->user);
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
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
	}

}