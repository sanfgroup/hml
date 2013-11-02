@extends('admin.layouts.default')

@section('content')
<table class="table table-bordered">
    <tr>
        <td>id</td>
        <td>login</td>
        <td>email</td>
        <td>referral</td>
        <td>balance</td>
        <td>action</td>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->refname}}</td>
        <td>{{$user->balance}}</td>
        <td>

            <a href="{{URL::route('admin.user.edit', array($user->id))}}" class="btn btn-warning">Редактировать</a>

            {{ Form::model($user, array('method'=>'delete','route' => array('admin.user.destroy', $user->id))) }}
            <button type="submit" class="btn btn-danger">Удалить</button>
            {{ Form::close() }}

        </td>
    </tr>
    @endforeach
</table>
{{$users->links()}}
@stop