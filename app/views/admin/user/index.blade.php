@extends('admin.layouts.default')

@section('content')
<form action="" method="get">
    <select name="id" id="user">
        <option value="">Все пользователи</option>
        @foreach(User::all() as $v)
        <option value="{{$v->id}}"
        @if($v->id == $s)
        selected
        @endif
        >{{$v->username}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary" href="#" id="user_balance">Поиск</button>
</form>
<table class="table table-bordered">
    <tr>
        <td>id</td>
        <td>Имя Фамилия</td>
        <td>login</td>
        <td>email</td>
        <td>skype</td>
        <td>referral</td>
        <td>balance</td>
        <td>Зарегистрировался</td>
        <td>action</td>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->fio}}</td>
        <td><a href="/admin/balance/{{$user->id}}">{{$user->username}}</a></td>
        <td><a href="{{URL::route('admin.tickets', array($user->id))}}">{{$user->email}}</a></td>
        <td><a href="skype:{{$user->skype}}?add">{{$user->skype}}</a></td>
        <td>{{$user->refname}}</td>
        <td>{{$user->balance}}</td>
        <td>{{$user->created_at}}</td>
        <td>

            <a href="{{URL::route('admin.user.edit', array($user->id))}}" class="btn btn-warning">Редактировать</a>

            {{ Form::model($user, array('method'=>'delete','route' => array('admin.user.destroy', $user->id))) }}
            <button type="button" class="btn btn-danger">Удалить</button>
            {{ Form::close() }}

        </td>
    </tr>
    @endforeach
</table>
{{$users->links()}}
@stop