<?php
namespace Admin;
use Input;

class AdminBalanceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['users'] = \User::all();
        if(Input::server("REQUEST_METHOD") == "GET"){
            $user_id = Input::get('user_search');
            $data['balance']= \Balance::orderBy('id', 'desc')->where('user_id', '=', $user_id)->paginate(10);
        }
        else{
            $data['balance'] = \Balance::orderBy('id', 'desc')->where('user_id', '!=', 0)->paginate(10);

        }
        return \View::make('admin.balance',$data);
	}

}