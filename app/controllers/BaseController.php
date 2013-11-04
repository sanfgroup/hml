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
        View::composer('site.private_header', function($view)
        {
            $data = array();
            if(!Auth::guest()) {
                $pm = new PerfectMoney();
                $uid = $this->user->id;
                $data['form'] = $pm->form($uid, $this->user->pay);
                $ok = new OkPay();
                $data['form2'] = $ok->form($uid, $this->user->pay);
            }
            $view->with($data);
        });
	}

}