@extends("site.layouts.default")

@section('content')

@include('site.private_header')
<div class="blocks_tarif1">
    <div>
        <div class="title">Купить тарифную линию</div>
    </div>
    <div class="tarcab">
        <div class="name">Red line</div>
        <div class="price">10 $</div>
        <ul class="control">
            <li><a href="#inv_red" data-toggle="modal">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(1))}}" data-toggle="confirmation">Купить</a></li>
            <li><a href="#" data-bb="confirm">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(1))}}" data-bb="confirm">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Orange line</div>
        <div class="price">35 $</div>
        <ul class="control">
            <li><a href="#inv_orange" data-toggle="modal">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(2))}}" data-toggle="confirmation">Купить</a></li>
            <li><a href="#">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(2))}}" data-bb="confirm">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Yellow line</div>
        <div class="price">70 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(3))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
</div>
<div class="blocks_tarif2">
    <div class="tarcab">
        <div class="name">Green line</div>
        <div class="price">110 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(4))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Blue line</div>
        <div class="price">180 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(5))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Pink line</div>
        <div class="price">250 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(6))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Purple line</div>
        <div class="price">400 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(7))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
</div>
@stop