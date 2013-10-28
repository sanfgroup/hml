<?php
namespace Admin;

use View, Input;

class NewsController extends \BaseController {
    public function addNews(){
        if (Input::server("REQUEST_METHOD") == "POST") {
            $post = new \News();
            $post->title = Input::get('title');
            $post->content = Input::get('text');
            $post->save();
        }
        return View::make('admin.news.add');
    }
}