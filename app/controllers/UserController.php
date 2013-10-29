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
            $user = new User();
            if(Session::has('ref')) {
                $refs = User::whereUsername(Session::get('ref'))->first();
                if(isset($refs->id))
                    $user->referral_id = $refs->id;
                Session::put('ref', '');
            }

            $user->fio = $input['fio'];
            $user->email = $input['email'];
            $user->username = $input['username'];
            $user->password = Hash::make($input['password']);
            $user->save();
            return Redirect::route('home')->with('flash_reg', 'Вы удачно зарегистрированы, авторизуйтесь пожалуйста!');
        } else {
            return Redirect::route('home')
                ->withErrors($v->errors());
        }
    }

    public function getLogin() {
        return View::make('site.user.registration');
    }

    public function postLogin() {

        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
//            'username' => 'vinnizp',
//            'password' => '111111'
        );

        dd(Auth::attempt($user));
        if (Auth::attempt($user)) {
            return Redirect::route('user.privat');
        } else {
            return Redirect::route('home')->with('flash_login', 'Неверный логин или пароль!');
        }
    }

    public function getPrivat() {
//        dd(Linear5::fnp());
        return View::make('site.user.privat');
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('home');
    }


} 