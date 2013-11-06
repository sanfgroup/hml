<?php
namespace Admin;


use View, Input;

class TicketsController extends \BaseController {
    public function index($id=0){
        if ($id!=0){
            $data['user'] = \User::find($id);
        }
        if (Input::server("REQUEST_METHOD") == "POST") {

        }
        return View::make('admin.user.');
    }
}