<?php
namespace Admin;

use View, Input;
class AdminReviewController extends \BaseController {
    public function reviewsList(){
        $data['reviews'] = \Reviews::paginate(10);
        return View::make('admin.reviews', $data);
    }
}