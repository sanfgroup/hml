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
    public function detailTicket($id){
        $ticketd = \Ticket::find($id);
        $data['ticket'] = $ticketd;
        $ticketd->thread = 1;


        if (Input::server("REQUEST_METHOD") == "POST") {
            $data['name'] = Input::get('theme');
            $data['message1'] = Input::get('content');
            $data['item'] = Input::get('item');
            $data['email'] = Input::get('email');
            Mail::send('emails.answer', $data, function($message) use ($data)
            {
                $message->to($data['email'], $data['name'])->subject('Поддержка '.$data['item']);
            });
        }
        $ticketd->save();
        return View::make('admin.tickets.index', $data);
    }

}