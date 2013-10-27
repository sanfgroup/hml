<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 27.10.13
 * Time: 17:07
 */

class UserController extends BaseController {

    public function getRegistration() {
        return View::make('site.user.registration');
    }

    public function postRegistration() {
        $input = Input::all();
        $rules = array(
            'fio'                   => 'Required|Min:3|Max:80',
            'email'                 => 'Required|Between:3,64|Email|Unique:users',
            'username'              => 'required|Unique:users',
            'password'              => 'Required|min:6|Confirmed',
            'password_confirmation' => 'Required|min:6'
        );
        $v = Validator::make($input, $rules);
        if( $v->passes() ) {
            User::create(array(
                'username'  => $input['username'],
                'email'     => $input['username'],
                'password'  => Hash::make($input['username']),
                'fio'       => $input['username'],
            ));
            return Redirect::route('home')->with('flash_reg', 'Вы удачно зарегистрированы, авторизуйтесь пожалуйста!');
        } else {
            return Redirect::route('home')
                ->withErrors($v->errors());
        }
    }

} 