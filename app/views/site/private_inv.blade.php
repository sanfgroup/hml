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
            <li><a href="#">Инфо</a></li>
            <li><a href="{{URL::route('user.deposites.buy', array(1))}}">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Orange line</div>
        <div class="price">35 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a href="{{URL::route('user.deposites.buy', array(2))}}">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Yellow line</div>
        <div class="price">70 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a href="{{URL::route('user.deposites.buy', array(3))}}">Купить</a></li>
        </ul>
    </div>
</div>
<div class="blocks_tarif2">
    <div class="tarcab">
        <div class="name">Green line</div>
        <div class="price">110 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a href="{{URL::route('user.deposites.buy', array(4))}}">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Blue line</div>
        <div class="price">180 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a href="{{URL::route('user.deposites.buy', array(5))}}">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Pink line</div>
        <div class="price">250 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a href="{{URL::route('user.deposites.buy', array(6))}}">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Purple line</div>
        <div class="price">400 $</div>
        <ul class="control">
            <li><a href="#">Инфо</a></li>
            <li><a href="{{URL::route('user.deposites.buy', array(7))}}">Купить</a></li>
        </ul>
    </div>
</div>
@stop