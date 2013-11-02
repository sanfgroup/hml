<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{

        View::composer('site.private_header', function($view)
        {
            if(!Auth::guest()) {
                $pm = new PerfectMoney();
                $data['form'] = $pm->form(Auth::user()->id);
                $ok = new OkPay();
                $data['form2'] = $ok->form(Auth::user()->id);
            }
            $view->with($data);
        });
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}