<?php

namespace Admin;

use Linear5, Linear10, Linear15;

class AdminLinearController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('admin.linear');
	}

}