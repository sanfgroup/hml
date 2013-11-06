<?php
namespace Admin;

use View, Input;
class AdminReviewController extends \BaseController {
    public function reviewsList(){
        $data['reviews'] = \Reviews::paginate(10);
        return View::make('admin.reviews', $data);
    }
    public function reviewDelete($id){
        \Reviews::find($id)->delete();
        return \Redirect::back();
    }
}