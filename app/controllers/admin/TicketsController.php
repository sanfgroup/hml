<?php
namespace Admin;


use View, Input, Mail;

class TicketsController extends \BaseController {

    public function full($id=0){
        $data = array();
        if ($id!=0){
            $data['user'] = \User::find($id);
                $data['user_a'] = $this->user;
        }
        if (Input::server("REQUEST_METHOD") == "POST") {
            $data['name'] = Input::get('theme');
            $data['item'] = Input::get('item');
            $data['email'] = Input::get('email');
            $data['message1'] = Input::get('content');
            Mail::send('emails.answer', $data, function($message) use ($data)
            {
                $message->to($data['email'], $data['name'])->subject('MyHappyLines');
                return \Redirect::to('admin/user');
            });
        }
        return View::make('admin.tickets.index', $data);
    }
    public function listTickets(){
        $data = array();
        $data['tickets'] = \Ticket::where('thwrite', '=', '0')->orderBy('created_at', 'desc')->paginate(10);
        return View::make('admin.tickets.tickets_list', $data);
    }
    public function detailTicket($id){
        $ticketd = \Ticket::find($id);
        $data['ticket'] = $ticketd;
        $ticketd->thread = 1;
        $ticketa = \Ticket::where('thwrite', '=', $id)->first();
        $data['ticketa'] = $ticketa;
        $ticketd->save();
        if (Input::server("REQUEST_METHOD") == "POST") {
            $data['name'] = Input::get('theme');
            $data['message1'] = Input::get('content');
            $data['item'] = Input::get('item');
            $data['email'] = Input::get('email');
            Mail::send('emails.answer', $data, function($message) use ($data)
            {
                $message->to($data['email'], $data['name'])->subject('Поддержка '.$data['item']);
            });


            $ticketd->save();
            $ticketd = new \Ticket();
            $ticketd->name = 'Поддержка MyHappyLines';
            $ticketd->item = $data['item'];
            $ticketd->email = $data['email'];
            $ticketd->message = $data['message1'];
            $ticketd->thwrite = $id;
            $ticketd->save();
            return \Redirect::route('admin.tickets.list');
        }

        return View::make('admin.tickets.index', $data);
    }
    public function deleteTicket($id){
        \Ticket::find($id)->delete();
        return \Redirect::back();
    }

    public function sendAll() {
        if (Input::server("REQUEST_METHOD") == "POST") {
            $user = \User::all();
            foreach($user as $u) {
                $data['fio'] = $u->fio;
                $data['thread'] = Input::get('item');
                $data['messagetext'] = Input::get('content');
                $data['email'] = $u->email;
                Mail::later(20,'emails.alluser', $data, function($message) use ($data)
                {
                    $message->to($data['email'], $data['fio'])->subject('MyHappyLines');
                    $message->headers('Precedence', 'bulk');
                });
            }
            return \Redirect::back()->with('status', 'Сообщения успешко отправлены');
        }
        return View::make('admin.tickets.all');
    }

    public function send() {

    }
}