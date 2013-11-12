@extends("site.layouts.default")

@section('content')
<div class="prof">
    @if(isset($message))
    {{$message}}
    @endif
{{ Form::open(array()) }}
<!--    @if($errors->count() > 0)-->
<!--    <div class="alert alert-danger">-->
<!--        @foreach( $errors->all() as $message )-->
<!--        <p>{{ $message }}</p>-->
<!--        @endforeach-->
<!--    </div>-->
<!--    @endif-->
    <ul>
        <li>
            <span style="float: left; color: #ff0000;">* </span>{{ Form::label('fio', 'Фамилия Имя') }}
            {{ Form::text('fio', $user->fio, array('class'=>'form-control', 'disabled')) }}
        </li>
        <li>
            {{ Form::label('old_password', 'Текущий пароль') }}
<!--            {{ Form::text('old_pass', null, array('class'=>'form-control')) }}-->
            <input type="password" name="old_password" id="old_password" class="form-control"  />
        </li>
        <li>
            {{ Form::label('new_password', 'Новый пароль') }}
<!--            {{ Form::text('new_pass', null, array('class'=>'form-control')) }}-->
            <input type="password" name="new_password" id="new_password"  class="form-control"/>
        </li>
        <li>
            <span style="float: left; color: #ff0000;">* </span>{{ Form::label('email', 'Электронная почта') }}
            {{ Form::text('email', $user->email, array('class'=>'form-control', 'disabled')) }}
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
        <li>
            {{Form::label('solidtrustpay', 'SolidTrustPay')}}
            {{Form::text('solidtrustpay', $user->solidtrustpay, array('class'=>'form-control'))}}
        </li>
    </ul>
    <div class="clearfix"></div>
    <button type="submit" class="btn btn-primary">Редактировать</button>
{{ Form::close() }}
</div>
@stop