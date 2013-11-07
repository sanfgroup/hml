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
            window.location = '/admin/checkout/'+$('#user :selected').val()
        });
    });
</script>

<h3>Заказы на выплату</h3>
{{Form::open(array('route'=>'stat.process'))}}
<table class="table table-bordered">
    <tr>
        <td>#</td>
        <td>Дата</td>
        <td>Пользователь</td>
        <td>Сумма</td>
        <td>Кошелек</td>
    </tr>
    @foreach($payments as $v)
    <tr>
        <td>
            <input type="checkbox" name="pay[]" value="{{$v->id}}"/>
        </td>
        <td>{{$v->created_at}}</td>
        <td>{{$v->user->username}}</td>
        <td>{{$v->summa}}</td>
        <td>{{$v->created}}</td>
    </tr>
    @endforeach
</table>
<button type="submit" class="btn btn-danger pay">Выплатить</button>
{{Form::close()}}
{{$payments->links()}}
<br/><br/>
@stop