<?php
namespace Admin;

class AdminBalanceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id=0)
	{
        $data['s'] = $id;
        $data['users'] = \User::remember(10)->get();
        if($id == 0)
		    $data['balance'] = \Balance::orderBy('id', 'desc')->where('user_id', '!=', 0)->paginate(10);
        else
            $data['balance'] = \Balance::orderBy('id', 'desc')->where('user_id', '=', $id)->paginate(10);

        return \View::make('admin.balance',$data);
	}

}