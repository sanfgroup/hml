<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 29.10.13
 * Time: 14:31
 */

class PerfectMoney {
    protected $account = 'U1991555';
    protected $login = '313853';
    protected static $password = 'V2*gr-Qt9#u31Z@ny!5';
    protected static $altpass = 'porotikova';
//    protected $account = 'U4390807';
//    protected $login = '5750852';
//    protected static $password = 'fp0up82h';

    public static function getp() {
        return strtoupper(md5(self::$altpass));
    }

    public function pay($amount, $account, $un = '') {
        $amount = round($amount,2);
        $pass = urlencode(self::password);
        $out=file_get_contents("https://perfectmoney.is/acct/confirm.asp?AccountID={$this->login}&PassPhrase={$pass}&Payer_Account={$this->account}&Payee_Account={$account}&Amount={$amount}&PAY_IN=1&PAYMENT_ID=1&Memo=".urlencode("User: ".$un));
//        print_r($out);
        if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER)){
            return false;
        }

        //dd($out);

        return true;
    }

    public function form($uid=0,$payment_id,$login,$a) {
        if($uid == 0)
            return null;
        $ad = URL::to('/');
        $form = <<<html
<form action="https://perfectmoney.is/api/step1.asp" method="POST" id="perfectForm" class="active">
    <input type="hidden" name="PAYEE_ACCOUNT" value="{$this->account}">
    <input type="hidden" name="PAYMENT_ID" class="payment_id" value="{$payment_id}">
    <input type="hidden" name="PAYMENT_AMOUNT" value="{$a}" id="get_perfect">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="STATUS_URL" value="">
    <input type="hidden" name="SUGGESTED_MEMO" value="User: {$login}">
    <input type="hidden" name="PAYEE_NAME" value="User: {$login}">
    <input type="hidden" name="PAYMENT_URL" value="{$ad}/pay/perfect">
    <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="NOPAYMENT_URL" value="{$ad}">
    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="user_id" value="{$uid}">
    <input type="hidden" name="BAGGAGE_FIELDS" value="user_id">
    <!--<input type="submit" name="PAYMENT_METHOD" value="Пополнить">-->
</form>
html;
        return $form;
    }
} 