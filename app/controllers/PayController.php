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
        if(empty($i['system']))
            return Redirect::back()->with('status', 'Заполните, пожалуйста, ваш профиль, для заказа выплаты или выберите другую платёжную систему.');
        if($this->user->balance < ($i['summ']))
            return Redirect::back()->with('status', 'Недостаточно денег на балансе.');
        if($i['summ'] >= 1) {
            $this->user->payments()->create(array(
                'summa' => $i['summ'],
                'to' => $i['system']
            ));
            return Redirect::back()->with('status', 'Заявка на выплату успешно отправлена');
        }
        return Redirect::back()->with('status', 'Минимальная выплата от 1$');
    }

    public function payin() {
        $i = Input::all();
            Eloquent::unguard();
            $key = md5(Str::random(32));
            $p = Payin::create(array(
                'key' => $key,
                'summa' => $i['summ']
            ));
            return json_encode(array(
                'key' => $key,
                'summ' => $p->summa,
                'id' => $p->id
            ));
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
        $r['sum'] = ceil($r['sum']*100)/100;
        $data['email'] = $uid->email;
        $data['fio'] = $uid->fio;
        $data['summa'] = $r['sum'];
        $data['system'] = "OkPay";
//        dd($uid->pay == $r['art']);
        $pay = Payin::whereKey(trim($r['art']))->first();
        if(isset($pay->summa) && $pay->summa == $r['sum']) {
//            dd($r['sum']);
            $uid->balance()->create(array(
                'summa' => round($r['sum'],2),
                'description' => 'Пополнение с кошелька OkPay: '.$r['payeer'],
                'type' => 1,
                'batch' => $r['batch']
            ));
            $uid->pay = Str::random(32);
            $uid->save();
            Mail::send('emails.min', $data, function($message) use ($data)
            {
                $message->to($data['email'], $data['fio'])->subject('Пополнение баланса!');
            });
        }
        return Redirect::route('private.inv')->with('status', 'Деньги успешно зачислены на ваш счёт!');

    }

    public function perfect() {
//        dd(Input::all());
        $account  = $_POST["PAYER_ACCOUNT"];
        $amount  = ceil($_POST["PAYMENT_AMOUNT"]*100)/100;
        $id  = $_POST["PAYMENT_ID"];
        $user_id = $_REQUEST["user_id"];
        $batch = $_REQUEST["PAYMENT_BATCH_NUM"];
        $uid = User::find($user_id);

        $data['email'] = $uid->email;
        $data['fio'] = $uid->fio;
        $data['summa'] = $amount;
        $data['system'] = "PerfectMoney";
        Mail::send('emails.min', $data, function($message) use ($data)
        {
            $message->to($data['email'], $data['fio'])->subject('Пополнение баланса!');
        });
        $pay = Payin::whereKey(trim($id))->first();
        if(isset($pay->summa) && $pay->summa == $amount) {
//            Eloquent::unguard();
//            dd(1);
            $uid->balance()->create(array(
                'summa' => round($amount,2),
                'description' => 'Пополнение с кошелька PerfectMoney: '.$account,
                'batch' => $batch,
                'type' => 1
            ));
            $uid->pay = Str::random(32);
            $uid->save();
        }
        return Redirect::route('private.inv')->with('status', 'Деньги успешно зачислены на ваш счёт!');
    }
}