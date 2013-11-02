<?php
namespace Admin;

class AdminBalanceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['balance'] = \Balance::paginate(10);
        return \View::make('admin.balance',$data);
	}

}