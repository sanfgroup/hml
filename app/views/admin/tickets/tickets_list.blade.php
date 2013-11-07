@extends('admin.layouts.default')

@section('content')
@foreach($tickets as $ticket)
<section @if($tickets->thread == 0) style="padding: 10px; border-radius: 5px; background: #abebff;" @endif >
    <h3><a href="">{{$ticket->name}}</a></h3>
    <p>{{$ticket->created_at}}</p>
    <div>{{$ticket->message}}</div>
</section>
@endforeach
@stop