@extends("site.layouts.default")

@section('content')
<h3>На данный момент сайт находится в разработке! Вам доступна только регистрация.</h3>

{{Auth::user()->balance}}

<br/>
<form action="https://perfectmoney.is/api/step1.asp" method="POST">
    <input type="hidden" name="PAYEE_ACCOUNT" value="U4390807">
    <input type="hidden" name="PAYEE_NAME" value="Test">
    <input type="hidden" name="PAYMENT_ID" value="1">
    <input type="text" name="PAYMENT_AMOUNT" value=""><BR>
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="STATUS_URL" value="">
    <input type="hidden" name="PAYMENT_URL" value="http://hml.san-francisco.com.ua/pay/perfect">
    <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="NOPAYMENT_URL" value="http://hml.san-francisco.com.ua/pay">
    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="SUGGESTED_MEMO" value="">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <input type="hidden" name="BAGGAGE_FIELDS" value="user_id">
    <input type="submit" name="PAYMENT_METHOD" value="Pay Now!">
</form>
@stop