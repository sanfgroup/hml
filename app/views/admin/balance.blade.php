@extends('admin.layouts.default')


@section('content')
<select name="user" id="user">
    <option value="">Все пользователи</option>
    @foreach($users as $v)
    <option value="{{$v->id}}"
        @if($v->id == $s)
    selected
    @endif
        >{{$v->username}}</option>
    @endforeach
</select>
<a class="btn btn-primary" href="#" id="user_balance">Поиск</a>
<script>
    $(function() {
        $('select').chosen();
        $('#user_balance').click(function(e){
            e.preventDefault();
            window.location = '/admin/balance/'+$('#user :selected').val()
        });
    });
</script>

<h3>Заказы на выплату</h3>
<table class="table table-bordered">
    <tr>
        <td>Дата</td>
        <td>Пользователь</td>
        <td>Сумма</td>
        <td>Кошелек</td>
    </tr>
    @foreach($payments as $v)
    <tr>
        <td>{{$v->created_at}}</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
</table>
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
        @endif
        @if($v->referal_id != 0)
        style="background: rgba(0,0,150,0.3);"
        @endif
        @if($v->type != 0)
        style="background: rgba(0,150,0,0.3);"
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