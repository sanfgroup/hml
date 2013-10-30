<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 29.10.13
 * Time: 14:31
 */

class OkPay {
    protected $account = 'OK280296052';
    protected $passcode = 'fp0up82h';

    function __constructor() {
        $this->account = Config::get('pay.okpay.account');
        $this->passcode = Config::get('pay.okpay.passcode');
    }

    public function pay($amount, $account, $memo='') {
        try
        {
            $s = $this->passcode . ':' . gmdate("Ymd:H");
            $secToken = hash('sha256', $s);
            $secToken = strtoupper($secToken);
            $client = new SoapClient("https://api.okpay.com/OkPayAPI?wsdl");
            $obj = (object) array();
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
        }
        catch (Exception $e)
        {
            $res['result'] = $e->getMessage();
        }
        return $res;
    }

    public function form($uid=0) {
        if($uid == 0)
            return null;
        $uid = User::find($uid);
        $payment_id = $uid->pay;
        $ad = URL::to('/');
        $form = <<<html
<form method="post" action="https://www.okpay.com/process.html">
<input type="hidden" name="ok_receiver" value="{$this->account}"/>
<input type="hidden" name="ok_item_1_name" value="Пополнение внутреннего баланса"/>
<input type="hidden" name="ok_currency" value="USD"/>
<input type="hidden" name="ok_item_1_article" value="{$payment_id}"/>
<input type="hidden" name="ok_item_1_type" value="service"/>
<input type="hidden" name="ok_return_success" value="{$ad}/pay/okpay"/>
<input type="hidden" name="ok_return_fail" value="{$ad}/pay/okpayFail"/>
<input type="text" name="ok_item_1_price" value=""/>
<input type="hidden" name="ok_item_1_custom_1_title" value="user_id">
<input type="text" name="ok_item_1_custom_1_value" maxlength="127" value="1">
<input type="image" name="submit" alt="OKPAY Payment" src="https://www.okpay.com/img/buttons/ru/top-up/t13g163x42en.png"/></form>
html;
        return $form;
    }
} 