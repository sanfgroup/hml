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
            return Redirect::back()->with('status', 'Ваша заявка на вывод денежных средств будет обработана с 22.00 МСК до 02.00 МСК (Но по регламенту вывод денежных средств может происходить в течение 24-48 часов)');
        }
        return Redirect::back()->with('status', 'Минимальная выплата от 1$');
    }

    public function payin() {
        $i = Input::all();
        if(isset($i['summ']) && isset($i['s'])) {
            Eloquent::unguard();
            $key = md5(Str::random(32).time());
            $p = Payin::create(array(
                'key' => $key,
                'summa' => $i['summ']
            ));
            if($i['s'] == 'perfect') {
                $ps = new PerfectMoney();
                echo $ps->form($this->user->id, $p->key, $this->user->username, $i['summ']);

            }if($i['s'] == 'okpay') {
                $ok = new OkPay();
                echo $ok->form($this->user->id, $p->key, $this->user->username, $i['summ']);

            }

            echo <<<html
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(function() {
$('form').submit();
});
</script>
html;
        } else
            return Redirect::back();
    }

    public function okpay() {
//        dd(Input::all());

//        $ok = new OkPay();
        $arr = Input::all();

        $r = array(
            'payeer' => $arr['ok_payer_email'],
            'sum' => $arr['ok_txn_gross'],
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
        $r['sum'] = round($r['sum'],2);
        $data['email'] = $uid->email;
        $data['fio'] = $uid->fio;
        $data['summa'] = $r['sum'];
        $data['system'] = "OkPay";
//        dd($uid->pay == $r['art']);
        $pay = Payin::whereKey($r['art'])->first();
        if(isset($pay->summa) && round($pay->summa,2) >= $r['sum']) {
            $pay->delete();
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
            return Redirect::route('private.inv')->with('status', 'Деньги успешно зачислены на ваш счёт!');
        }
        return Redirect::route('private.inv')->with('status', 'Ошибка, обратитесь к администратору сайта!');

    }

    public function perfect() {
        $string=
            $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
            $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
            $_POST['PAYMENT_BATCH_NUM'].':'.
            $_POST['PAYER_ACCOUNT'].':'.PerfectMoney::getp().':'.
            $_POST['TIMESTAMPGMT'];

        $hash=strtoupper(md5($string));
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
        $pay = Payin::whereKey($id)->first();
        if(isset($pay->summa) && round($pay->summa,2) == $amount && $hash==$_POST['V2_HASH']) {
            Mail::send('emails.min', $data, function($message) use ($data)
            {
                $message->to($data['email'], $data['fio'])->subject('Пополнение баланса!');
            });
            $pay->delete();
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
            return Redirect::route('private.inv')->with('status', 'Деньги успешно зачислены на ваш счёт!');
        }
        return Redirect::route('private.inv')->with('status', 'Ошибка, обратитесь к администратору сайта!');
    }
}