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
    <tr
    @if($v->payed == 1)
    style="background: rgba(0,255,0,0.2)"
    @endif
    @if($v->payed == 2)
    style="background: rgba(255,0,0,0.2)"
    @endif
        >
        <td>
            <input type="checkbox" name="pay[]" value="{{$v->id}}"/>
        </td>
        <td>{{$v->created}}</td>
    @if(!isset($v->user->username))
    <td>Deleted</td>
    @else
    <td>
        <span>{{$v->user->username}}</span>
        <p style="font-size: 10px "><a href="{{URL::route('admin.tickets', array($v->user->id))}}">Написать пользователю</a></p>
    </td>
    @endif
        <td>{{$v->summas}}</td>
        <td>{{$v->to}}</td>
    </tr>
    @endforeach
</table>
<input type="hidden" name="type" value="" id="ftype"/>
<input type="submit" name="type" value="Pay" class="btn btn-primary pay"/>
<input type="submit" name="type" value="Payed" class="btn btn-warning payed"/>
<input type="submit" name="type" value="Delete" class="btn btn-danger delete"/>
{{Form::close()}}
{{$payments->links()}}
<br/><br/>
@stop