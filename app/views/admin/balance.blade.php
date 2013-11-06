@extends('admin.layouts.default')


@section('content')
<h3>Заказы на выплату</h3>
<table class="table table-bordered">
    <tr>
        <td>Дата</td>
        <td>Пользователь</td>
        <td>Сумма</td>
        <td>Кошелек</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
{{Form::open(array('method' => 'Get'))}}
<select name="user_search" id="user_search">
    <option value="none">Выберите пользователя</option>
    @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->username}}</option>
    @endforeach
</select>
<select name="type_search" id="type_search">
    <option value="0">Расходы</option>
    <option value="1">Доходы</option>
    <option value="3"></option>
</select>
<button type="submit">Поиск</button>
{{Form::close()}}

<h3>Полная статистика начислений</h3>
    <table class="table table-bordered">
        <tr>
            <th>Дата</th>
            <th>Пользователь</th>
            <th>Сумма</th>
            <th style="width:300px;">Операция</th>
        </tr>
        @foreach($balance as $v)
        <tr
            @if($v->summa < 0)
                style="background: rgba(255,0,0,0.3);"
            @elseif($v->type == 1)
                style="background: rgba(0,255,0,0.3);"
            @elseif($v->type == 0 && $v->summa > 0)
                style="background: rgba(0,0,150,0.3);"
            @endif
            >
            <td>{{$v->created}}</td>
            <td>
                @if($v->user_id != 0)
                {{$v->user()->remember(5)->first()->username}}
                @endif
            </td>
            <td>{{$v->summa}}$</td>
            <td>{{$v->description}}</td>
        </tr>
        @endforeach
    </table>
    {{$balance->links()}}
@stop