<?php

class PayController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function perfect() {
        $account  = $_POST["PAYER_ACCOUNT"];
        $amount  = $_POST["PAYMENT_AMOUNT"];
        $id  = $_POST["PAYMENT_ID"];
        $user_id = $_REQUEST["user_id"];
        $uid = User::find($user_id);
        if(Hash::check($uid->username.$uid->pay, $id)) {
            Eloquent::unguard();
            Balance::create(array(
                'user_id' => $uid->id,
                'summa' => $amount,
                'description' => 'Начисление с кошелька PerfectMoney: '.$account
            ));
            $uid->pay = $uid->pay+1;
            $uid->save();
        }
        return Redirect::route('user.privat');
    }
}