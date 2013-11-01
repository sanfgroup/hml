@extends("site.layouts.default")

@section('content')
{{ Form::open(array('route' => 'user.reg', 'method' => 'POST')) }}
<ul>
    <li>
        {{ Form::label('username', 'Username:') }}
        {{ Form::text('username') }}
    </li>
    <li>
        {{ Form::label('password', 'Password:') }}
        {{ Form::text('password') }}
    </li>
    <li>
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email') }}
    </li>
    <li>
        {{ Form::label('fio', 'Fio:') }}
        {{ Form::text('fio') }}
    </li>
    <li>
        {{ Form::label('referal_id', 'Referal_id:') }}
        {{ Form::text('referal_id') }}
    </li>
    <li>
        {{ Form::label('okpay', 'Okpay:') }}
        {{ Form::text('okpay') }}
    </li>
    <li>
        {{ Form::label('perfectmoney', 'Perfectmoney:') }}
        {{ Form::text('perfectmoney') }}
    </li>
    <li>
        {{ Form::label('solidtrustpay', 'Solidtrustpay:') }}
        {{ Form::text('solidtrustpay') }}
    </li>
    <li>
        {{ Form::label('zipcode', 'Zipcode:') }}
        {{ Form::text('zipcode') }}
    </li>
    <li>
        {{ Form::submit() }}
    </li>
</ul>
{{ Form::close() }}
@stop