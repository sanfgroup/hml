@extends('admin.layouts.default')

@section('content')

{{ Form::model($user, array('route' => array('admin.user.update', $user->id),'method'=>'put')) }}
<ul>
    <li>
        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('fio', 'Фамилия Имя') }}
        {{ Form::text('fio', $user->fio, array('class'=>'form-control')) }}
    </li>
    <li>
        {{ Form::label('new_pass', 'Новый пароль') }}
        <!--            {{ Form::text('new_pass', null, array('class'=>'form-control')) }}-->
        <input type="password" name="new_pass" id="new_pass"  class="form-control"/>
    </li>
    <li>
        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('email', 'Электронная почта') }}
        {{ Form::text('email', $user->email, array('class'=>'form-control')) }}
    </li>
    <li>
        <span style="float: left; color: #ff0000;">* </span>{{Form::label('skype', 'Skype')}}
        {{ Form::text('skype', $user->skype, array('class'=>'form-control')) }}
    </li>

    <!--                    <li>-->
    <!--                       {{ Form::label('referal_id', 'Referal_id:') }}-->
    <!--                       {{ Form::text('referal_id') }}-->
    <!--                    </li>-->
    <li>
        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('perfectmoney', 'Perfectmoney') }}
        {{ Form::text('perfectmoney', $user->perfectmoney, array('class'=>'form-control')) }}
    </li>

    <li>
        {{ Form::label('okpay', 'Okpay') }}
        {{ Form::text('okpay', $user->okpay, array('class'=>'form-control')) }}
    </li>
</ul>
<button type="submit" class="btn btn-warning">Редактировать</button>
{{ Form::close() }}
@stop