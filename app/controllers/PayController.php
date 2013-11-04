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

    public function pay() {
        $i = Input::all();
        if($i['summ'] != 0) {
            Auth::user()->payments()->create(array(
                'summa' => $i['summa']*0.95,
                'to' => $i['system']
            ));
        }
        return Redirect::back()->with('status', 'Заявка на выплату успешно отправлена');
    }

    public function okpayPay() {
        $ok = new OkPay();
        $u = Auth::user();
        $account = $u->okpay;
        $amount = Input::get('amount', 0);
        if($amount <= $u->balance && !empty($account)) {

            if($ok->pay($amount, $account)) {
                $u->balance()->create(array(
                    'summa' => -$amount,
                    'description' => 'Вывод денег на кошелек OkPay: '.$account
                ));
            }

        }
    }

    public function okpay() {
//        dd(Input::all());

//        $ok = new OkPay();
        $arr = Input::all();

        $r = array(
            'payeer' => $arr['ok_payer_email'],
            'sum' => $arr['ok_txn_fee'],
            'curr' => $arr['ok_txn_currency'],
            'batch' => $arr['ok_txn_id'],
            'status' => $arr['ok_txn_status'],
            'kind' => $arr['ok_txn_kind'],
            'method' => $arr['ok_txn_payment_method'],
            'uid' => $arr['ok_item_1_custom_1_value'],
            'art' => $arr['ok_item_1_article'],
            'date' => time()
        );
        $uid = User::find($r['uid']);

        $data['email'] = $uid->email;
        $data['fio'] = $uid->fio;
        $data['summa'] = $r['sum'];
        $data['name'] = "OkPay";
        Mail::send('emails.min', $data, function($message) use ($data)
        {
            $message->to($data['email'], $data['fio'])->subject('Пополнение баланса!');
        });
//        dd($uid->pay == $r['art']);
        if($r['art'] == $uid->pay) {
//            dd($r['sum']);
            $uid->balance()->create(array(
                'summa' => $r['sum'],
                'description' => 'Начисление с кошелька OkPay: '.$r['payeer'],
                'type' => 1
            ));
            $uid->pay = Str::random(32);
            $uid->save();
        }
        return Redirect::route('user.privat');


        /*$account  = $_POST["PAYER_ACCOUNT"];
        $amount  = $_POST["PAYMENT_AMOUNT"];
        $id  = $_POST["PAYMENT_ID"];
        $user_id = $_REQUEST["user_id"];
        $uid = User::find($user_id);
        $h = $uid->username.$uid->pay;
        if($id == $uid->pay) {
            $uid->balance()->create(array(
                'summa' => $amount,
                'description' => 'Начисление с кошелька PerfectMoney: '.$account
            ));
            $uid->pay = Str::random(32);
            $uid->save();
        }
        return Redirect::route('user.privat');*/
    }

    public function perfectPay() {
        $pm = new PerfectMoney();
        $u = Auth::user();
        $account = $u->perfectmoney;
        $amount = Input::get('amount', 0);
        if($amount <= $u->balance) {
            if($pm->pay($amount, $account)) {
                $u->balance()->create(array(
                    'summa' => -$amount,
                    'description' => 'Вывод денег на кошелек PerfectMoney: '.$account
                    ));
            }

        }

        return Redirect::route('user.linear')->with('status', 'Деньги успешно зачислены на ваш счёт!');
    }

    public function perfect() {
//        dd(Input::all());
        $account  = $_POST["PAYER_ACCOUNT"];
        $amount  = $_POST["PAYMENT_AMOUNT"];
        $id  = $_POST["PAYMENT_ID"];
        $user_id = $_REQUEST["user_id"];
        $uid = User::find($user_id);

        $data['email'] = $uid->email;
        $data['fio'] = $uid->fio;
        $data['summa'] = $amount['sum'];
        $data['summa'] = $amount['sum'];
        $data['name'] = "OkPay";
        Mail::send('emails.min', $data, function($message) use ($data)
        {
            $message->to($data['email'], $data['fio'])->subject('Пополнение баланса!');
        });
        if($id == $uid->pay) {
//            Eloquent::unguard();
//            dd(1);
            $uid->balance()->create(array(
                'summa' => $amount,
                'description' => 'Начисление с кошелька PerfectMoney: '.$account,
                'type' => 1
            ));
            $uid->pay = Str::random(32);
            $uid->save();
        }
        return Redirect::route('user.linear')->with('status', 'Деньги успешно зачислены на ваш счёт!');
    }
}