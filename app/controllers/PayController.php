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
        dd(Input::all());

        $request = 'ok_verify=true';

        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $request .= "&$key=$value";
        }

        $fsocket = false;
        $result = false;

        // Try to connect via SSL due sucurity reason
        if ( $fp = @fsockopen('ssl://www.okpay.com', 443, $errno, $errstr, 30) ) {
            // Connected via HTTPS
            $fsocket = true;
        } elseif ($fp = @fsockopen('www.okpay.com', 80, $errno, $errstr, 30)) {
            // Connected via HTTP
            $fsocket = true;
        }

        // If connected to OKPAY
        if ($fsocket == true) {
            $header = 'POST /ipn-verify.html HTTP/1.0' . "\r\n" .
                'Host: www.okpay.com'."\r\n" .
                'Content-Type: application/x-www-form-urlencoded' . "\r\n" .
                'Content-Length: ' . strlen($request) . "\r\n" .
                'Connection: close' . "\r\n\r\n";

            @fputs($fp, $header . $request);
            $string = '';
            while (!@feof($fp)) {
                $res = @fgets($fp, 1024);
                $string .= $res;
                // Find verification result in response
                if ( $res == 'VERIFIED' || $res == 'INVALID' || $res == 'TEST') {
                    $result = $res;
                    break;
                }
            }
            @fclose($fp);
        }

        if ($result == 'VERIFIED') {
            // check the "ok_txn_status" is "completed"
            // check that "ok_txn_id" has not been previously processed
            // check that "ok_receiver_email" is your OKPAY email
            // check that "ok_txn_gross"/"ok_txn_currency" are correct
            // process payment

        } elseif($result == 'INVALID') {
            // If 'INVALID': log for manual investigation.

        } elseif($result == 'TEST') {
            // If 'TEST': do something

        } else {
            // IPN not verified or connection errors
            // If status != 200 IPN will be repeated later
            return Redirect::route('user.privat');
        }

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

        return Redirect::route('user.privat');
    }

    public function perfect() {
//        dd(Input::all());
        $account  = $_POST["PAYER_ACCOUNT"];
        $amount  = $_POST["PAYMENT_AMOUNT"];
        $id  = $_POST["PAYMENT_ID"];
        $user_id = $_REQUEST["user_id"];
        $uid = User::find($user_id);
        $h = $uid->username.$uid->pay;
        if($id == $uid->pay) {
//            Eloquent::unguard();
//            dd(1);
            $uid->balance()->create(array(
                'summa' => $amount,
                'description' => 'Начисление с кошелька PerfectMoney: '.$account
            ));
            $uid->pay = Str::random(32);
            $uid->save();
        }
        return Redirect::route('user.privat');
    }
}