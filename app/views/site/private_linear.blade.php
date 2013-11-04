@extends("site.layouts.default")

@section('content')
@include('site.private_header')

</div>
<div class="bgblock">
    <a class="buy_lin first" href="{{URL::route('user.linear.buy', array(5))}}">
        Light 5$&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>купить&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </a>
    <a class="buy_lin second" href="{{URL::route('user.linear.buy', array(10))}}">&nbsp;&nbsp;&nbsp;&nbsp;Happy 10$<br>&nbsp;&nbsp;&nbsp;&nbsp;купить</a>
    <a class="buy_lin third" href="{{URL::route('user.linear.buy', array(15))}}">Super 15$&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>купить&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
</div>
<div class="container_all">
    <div class="turns">
        <div class="turn">
            <ul>
                <li><span>Light 5$</span></li>
                <li>Куплено тарифов - {{Auth::user()->linear5()->remember(1)->count()}} шт.</li>
                <li>Закрыто тарифов - {{Auth::user()->linear5()->remember(1)->wherePayed(1)->count()}} шт.</li>
            </ul>
            @if(!empty(Auth::user()->l5pos))
            <p>Ближайшие номера в очереди:</p>
            <div class="nums_t">
                @foreach(Auth::user()->l5pos as $v)
                <div class="num_turn">{{$v}}</div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="turn">
            <ul>
                <li><span>Happy 10$</span></li>
                <li>Куплено тарифов - {{Auth::user()->linear10()->count()}} шт.</li>
                <li>Закрыто тарифов - {{Auth::user()->linear10()->wherePayed(1)->count()}} шт.</li>
            </ul>
            @if(!empty(Auth::user()->l10pos))
            <p>Ближайшие номера в очереди:</p>
            <div class="nums_t">
                @foreach(Auth::user()->l10pos as $v)
                <div class="num_turn">{{$v}}</div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="turn">
            <ul>
                <li><span>Super 15$</span></li>
                <li>Куплено тарифов - {{Auth::user()->linear15()->count()}} шт.</li>
                <li>Закрыто тарифов - {{Auth::user()->linear15()->wherePayed(1)->count()}} шт.</li>
            </ul>

            @if(!empty(Auth::user()->l15pos))
            <p>Ближайшие номера в очереди:</p>
            <div class="nums_t">
                @foreach(Auth::user()->l15pos as $v)
                <div class="num_turn">{{$v}}</div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@stop