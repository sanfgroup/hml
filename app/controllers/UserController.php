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
            'perfectmoney'          => 'Required',
            'skype'                 => 'Required',
            'password_confirmation' => 'Required|min:6',
            'captcha'               => array('required', 'captcha:2'),
            'conf'                  => 'Required',
        );
        $v = Validator::make($input, $rules);
        if( $v->passes() ) {
            $user = new User();
            if(Session::has('ref') || $input['referral'] != '') {
                $refname = empty($input['referral'])?Session::get('ref'):$input['referral'];
                $refs = User::whereUsername($refname)->first();
                if(isset($refs->id))
                    $user->referal_id = $refs->id;
                Session::put('ref', '');
            }

            $user->fio = $input['fio'];
            $user->email = $input['email'];
            $user->username = $input['username'];
            $user->password = Hash::make($input['password']);
            $user->skype = Input::get('skype');
            $user->perfectmoney = Input::get('perfectmoney');
            $user->okpay = Input::get('okpay');
            $user->save();

            $user->balance()->create(array(
                'summa' => 1000.0,
                'description' => 'Тестовое пополнение баланса'
            ));

            $data['fio'] = $user->fio;
            $data['login'] = $user->username;
            $data['email'] = $user->email;
            $data['pass'] = $input['password'];
            Mail::send('emails.auth.registration', $data, function($message) use ($data)
            {
                $message->to($data['email'], $data['fio'])->subject('Регистрация в проекте MyHappyLines!');
            });
//            Cache::flush();
            return Redirect::route('home')->with('status', 'Поздравляем вас с успешной регистрацией в проекте MyHappyLines, авторизуйтесь пожалуйста!');
        } else {
            return Redirect::route('home')->withInput()
                ->withErrors($v->errors());

        }
    }

    public function getLogin() {
        return View::make('site.user.registration');
    }

    public function postLogin() {
        $rule =  array('captcha' => array('required', 'captcha:1'));
        $validator = Validator::make(Input::all(), $rule);
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );
//        dd($validator->passes());
        if ($validator->passes() && Auth::attempt($user)) {
            return Redirect::route('private.inv');
        }
        elseif($validator->fails()){
            return Redirect::route('home')->with('flash_login', 'Неверная captcha!');
        } else {
            return Redirect::route('home')->with('flash_login', 'Неверный логин или пароль!');
        }
    }

    public function getPrivat() {

        return View::make('site.user.profile');
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('home');
    }
    public function userProfile(){
            $usid = $this->user->id;
            $user = User::find($usid);
            $logref = $this->user->referral()->first();

            if($logref != null)
                $data['logref'] = $logref->username;
            else
                $data['logref']='';

            $data['user'] = $user;
        if (Input::server("REQUEST_METHOD") == "POST") {
            if (Input::get('old_password')!='' && Hash::check(Input::get('old_password'), $this->user->getAuthPassword()) && Input::get('new_password')!=''){
                $pass = Input::get('new_password');
               $user->password = Hash::make($pass);
                $data['message'] = '<div style="background: rgba( 0, 255, 0, 0.3); padding: 10px;, border: 1px solid #B5DDAF; border-radius: 5px;">Пароль успешно изменен</div>';

            }
            elseif(Input::get('old_password')==''){

            }
            else{
                $data['message'] = '<div style="background: rgba( 255, 0, 0, 0.3); padding: 10px;, border: 1px solid #B5DDAF; border-radius: 5px;">Неправильный пароль</div>';
            }
            $user->skype = Input::get('skype');
            $user->perfectmoney = Input::get('perfectmoney');
            $user->okpay = Input::get('okpay');
            $user->save();
        }
            return View::make('site.user.profile', $data);
    }
    public function userReferal(){
        \Cache::flush();
        $mr = $this->user->referral()->remember(10);
        $data['l1'] = $mr->count();
        $data['l2'] = 0;

        foreach($mr->get() as $v) {
            $data['l2'] += $v->referral()->remember(10)->count();
        }
        $data['ref'] = $this->user->referral()->remember(10)->paginate(10);
       return View::make('site.user.referal', $data);
    }

    public function postRecovery() {

        $rule =  array('captcha' => array('required', 'captcha:3'));
        $validator = Validator::make(Input::all(), $rule);
//        dd($validator->passes());
        if ($validator->passes()) {
            $credentials = array(
                "email" => Input::get("email")
            );
            Password::remind($credentials,
                function($message, $user)
                {
                    $message->with($user);
                    $message->subject('Восстановление пароля');
                }
            );
            $data["requested"] = true;
            return Redirect::route("home")
                ->with('status', 'На почту отправлена инструкция по восстановлению пароля');
        }
        elseif($validator->fails()){
            return Redirect::route('home')->with('flash_login', 'Неверная captcha!');
        } else {
            return Redirect::route('home')->with('flash_login', 'Неверный логин или пароль!');
        }
    }

    public function passwordReset($token, $email) {
        $validator = Validator::make(Input::all(), array(
            "token"                 => "exists:token,token"
        ));
        if ($validator->passes())
        {
            $credentials = array(
                "email" => $email
            );
            Password::reset($credentials,
                function($user, $password)
                {
                    $pass = Str::random(6);
                    $user->password = Hash::make($pass);
                    $user->save();
                    $data['login'] = $user->username;
                    $data['pass'] = $pass;
                    $data['fio'] = $user->fio;
                    Mail::send('emails.auth.reset', $data, function($message) use ($data)
                    {
                        $message->to($data['email'], $data['fio'])->subject('Реферальное вознаграждение!');
                    });
                    Auth::login($user);
                    return Redirect::route("user.profile");
                }
            );
        }
    }
} 