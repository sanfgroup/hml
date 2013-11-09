<?php
namespace Admin;


use View, Input;

class NewsController extends \BaseController {
    public function addNews($id=0){
        $data=array();
        if ($id!=0){
            $data['post'] = \News::find($id);
        }
        if (Input::server("REQUEST_METHOD") == "POST") {
            if ($id!=0){
                $data['post']->title = Input::get('title');
                $data['post']->content = Input::get('text');
                $post = \News::find($id);
                $post->title = Input::get('title');
                $post->content = Input::get('text');
                $post->save();
            }
            else{
                $post = new \News();
                $post->title = Input::get('title');
                $post->content = Input::get('text');
                $post->save();

            }
        }
            return View::make('admin.news.add', $data);

    }

    public function listNews(){
        $data['posts'] = \News::orderBy('created_at', 'desc')->paginate(10);
        return View::make('admin.news.list', $data);
    }

    public function detailNews($id){
        $data['post'] = \News::find($id);
        return View::make('admin.news.detail', $data);
    }

    public function deletePost($id){
        \News::find($id)->delete();
        $data['posts'] = \News::paginate(10);
        return \Redirect::back();
    }

}