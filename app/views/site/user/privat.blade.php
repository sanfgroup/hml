@extends("site.layouts.default")

@section('content')
<h3>На данный момент сайт находится в разработке! Вам доступна только регистрация.</h3>

@if(Auth::user()->linear()->count() == 0)
<p>
    Не в очереди
</p>
@else
<p>
    В очереди
</p>
@endif
@stop