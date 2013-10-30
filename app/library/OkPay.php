<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 29.10.13
 * Time: 14:31
 */

class OkPay
{
    protected $account = 'OK280296052';
    protected $passcode = 'Qw93Jje7YZm4r6H2LtKo58Gnb';

    function __constructor()
    {
        $this->account = Config::get('pay.okpay.account');
//        $this->passcode = Config::get('pay.okpay.passcode');
    }

    public function pay($amount, $account, $memo = '')
    {
        try {
            $s = $this->passcode . ':' . gmdate("Ymd:H");
            $secToken = hash('sha256', $s);
            $secToken = strtoupper($secToken);
            $client = new SoapClient("https://api.okpay.com/OkPayAPI?wsdl");
            $obj = (object)array();
            $obj->WalletID = $this->account;
            $obj->SecurityToken = $secToken;
            $obj->Currency = "USD";
            $obj->Receiver = $account;
            $obj->Amount = $amount;
            $obj->Comment = $memo;
            $obj->IsReceiverPaysFees = false;
//			$obj->Invoice = md5($memo);
            $webService1 = $client->Send_Money($obj);
            $res['answer'] = $webService1->Send_MoneyResult;
            if ($res['batch'] = $res['answer']->ID)
                $res['result'] = 'OK';
            else
                $res['result'] = $res['answer']->Status;
        } catch (Exception $e) {
            $res['result'] = $e->getMessage();
        }
        return $res;
    }

    public function form($uid = 0)
    {
        if ($uid == 0)
            return null;
        $uid = User::find($uid);
        $payment_id = $uid->pay;
        $ad = URL::to('/');
        $form = <<<html
<form method="post" action="https://www.okpay.com/process.html">
<input type="hidden" name="ok_receiver" value="{$this->account}"/>
<input type="hidden" name="ok_item_1_name" value="Recharge_the_internal_balance"/>
<input type="hidden" name="ok_currency" value="USD"/>
<input type="hidden" name="ok_item_1_article" value="{$payment_id}"/>
<input type="hidden" name="ok_item_1_type" value="service"/>
<input type="hidden" name="ok_return_success" value="{$ad}/pay/okpay"/>
<input type="hidden" name="ok_return_fail" value="{$ad}/pay/okpayFail"/>
<input type="text" name="ok_item_1_price" value=""/>
<input type="hidden" name="ok_item_1_custom_1_title" value="user_id">
<input type="hidden" name="ok_item_1_custom_1_value" maxlength="127" value="{$uid->id}">
<input type="image" name="submit" alt="OKPAY Payment" src="https://www.okpay.com/img/buttons/ru/top-up/t13g163x42en.png"/></form>
html;
        return $form;
    }


    function inet_request($url, $par = array(), $cookiefl = '', $agent = '', $onlyheader = false)
    {
        global $ch;
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, trim($url));
            curl_setopt($ch, CURLOPT_HEADER, $onlyheader);
            curl_setopt($ch, CURLOPT_USERAGENT, ($agent ? $agent : 'Mozilla/5.0 (Windows; U; Windows NT 6.1; ru; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'));
            if ($onlyheader)
                curl_setopt($ch, CURLOPT_NOBODY, true);
            elseif (empty($par))
                curl_setopt($ch, CURLOPT_HTTPGET, true);
            else {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $par);
            }
            @curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefl);
            @curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefl);
            $answ = curl_exec($ch);
            if (curl_errno($ch) != 0) $answ = false;
        } catch (Exception $e) {
            $answ = false;
        }
        return $answ;
    }

} 