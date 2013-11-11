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

<br/><br/>
<form action="" method="get">
    <p>
        <select name="sort" id="sort">
            <option value="" >Все операции</option>
            <option value="mm" @if($sort =='mm') selected @endif>Расходы</option>
            <option value="mp" @if($sort =='mp') selected @endif>Доходы</option>
            <option value="in" @if($sort =='in') selected @endif>Пополнение баланса</option>
            <option value="out" @if($sort =='out') selected @endif>Вывод денег</option>
            <option value="ref" @if($sort =='ref') selected @endif">Реферальные</option>
    </select>
        <input class="btn btn-primary" type="submit" value="Фильтр"/>
    </p>
</form>

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
                <?php
                $userss = $v->user()->remember(5)->first()
                ?>
                @if($v->user_id != 0 && isset($userss->username))
                {{$userss->username}}
                @endif
            </td>
            <td>{{$v->summas}}$</td>
            <td>{{$v->description}}
            @if($v->batch != '')
                Batch: {{$v->batch}}
            @endif
            </td>
        </tr>
        @endforeach
    </table>
    {{$balance->links()}}
{{Form::open(array('url'=>'/admin/balance/add'))}}
<p>
    <label for="description">Пользователь:</label>
    <select name="user_id" id="user">
        @foreach($users as $v)
        <option value="{{$v->id}}">{{$v->username}}</option>
        @endforeach
    </select>
</p>
<p>
    <label for="summa">Сумма:</label>
    <input type="text" name="summa" class="form-control" />
</p>
<p>

    <label for="description">Описание:</label>
    <input type="text" name="description" class="form-control" />
</p>
<p>
    <label for="description">Операция:</label>
    <select name="type">
        <option value="0">Обычные операции</option>
        <option value="1">Пополнение</option>
        <option value="2">Выплата</option>
    </select>
</p>
<p><input type="submit" value="Добавить" class="btn btn-primary"/></p>
{{Form::close()}}
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
@stop