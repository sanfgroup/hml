@extends("site.layouts.default")

@section('content')
<h3>На данный момент сайт находится в разработке! Вам доступна только регистрация.</h3>

{{Auth::user()->balance}}

<br/>

@stop