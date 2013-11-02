<?php
namespace Admin;

use View, Input;

class AdminUserController extends \BaseController {
    public function index() {
        $data['users'] = User::paginate(20);
        return View::make('admin.users.index', $data);
    }

}