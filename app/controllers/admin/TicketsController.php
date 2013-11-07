<?php
namespace Admin;


use View, Input;

class TicketsController extends \BaseController {

    public function index($id=0){
        $data = array();
        if ($id!=0){
            $data['user'] = \User::find($id);
            $data['user_a'] = $this->user();
        }
        if (Input::server("REQUEST_METHOD") == "POST") {
            $data['theme'] = Input::get('theme');
            $data['email'] = Input::get('email');
            $data['message'] = Input::get('content');

        }
        return View::make('admin.tickets.index', $data);
    }
    public function listTickets(){
        $data = array();
        $data['tickets'] = \Ticket::paginate(10);
        return View::make('admin.tickets.list', $data);
    }
}