<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 29.10.13
 * Time: 14:31
 */

class PerfectMoney {
    protected $account = 'U4390807';
    protected $login = '5750852';
    protected $password = 'fp0up82h';

    function __constructor() {
        $this->login = Config::get('pay.perfect.login');
        $this->password = Config::get('pay.perfect.password');
        $this->account = Config::get('pay.perfect.account');
    }

    public function pay($amount, $account) {
        $out=file_get_contents("https://perfectmoney.is/acct/confirm.asp?AccountID={$this->login}&PassPhrase={$this->password}&Payer_Account={$this->account}&Payee_Account={$account}&Amount={$amount}&PAY_IN=1&PAYMENT_ID=1");

        if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER)){
            return false;
        }

        dd($out);

        return true;
    }

    public function form($uid=0) {
        if($uid == 0)
            return null;
        $uid = User::find($uid);
        $payment_id = $uid->pay;
        $ad = URL::to('/');
        $form = <<<html
<form action="https://perfectmoney.is/api/step1.asp" method="POST">
    <input type="hidden" name="PAYEE_ACCOUNT" value="{$this->account}">
    <input type="hidden" name="PAYEE_NAME" value="Пополнение внутреннего баланса">
    <input type="hidden" name="PAYMENT_ID" value="{$payment_id}">
    <input type="text" name="PAYMENT_AMOUNT" value="">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="STATUS_URL" value="">
    <input type="hidden" name="PAYMENT_URL" value="{$ad}/pay/perfect">
    <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="NOPAYMENT_URL" value="{$ad}/pay">
    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="SUGGESTED_MEMO" value="">
    <input type="hidden" name="user_id" value="{$uid->id}">
    <input type="hidden" name="BAGGAGE_FIELDS" value="user_id">
    <input type="submit" name="PAYMENT_METHOD" value="Пополнить">
</form>
html;
        return $form;
    }
} 