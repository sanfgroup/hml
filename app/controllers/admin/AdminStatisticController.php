<?php
namespace Admin;

class AdminStatisticController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $date_f = \Input::get('date_from', '2013-10-01').' 00:00:00';
        $date_t = \Input::get('date_to', date('Y-m-d')).' 23:59:59';

        $data['users']      = \User::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(5)->get();
        $data['inv']        = \Inv::remember(5)->get();
        $data['linear5']    = \Linear5::whereBetween('created_at', array($date_f, $date_t))->remember(5)->get();
        $data['linear10']   = \Linear10::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(5)->get();
        $data['linear15']   = \Linear15::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(5)->get();
        $data['date_f'] = $date_f;
        $data['date_t'] = $date_t;
        return \View::make('admin.statistic', $data);
	}

}