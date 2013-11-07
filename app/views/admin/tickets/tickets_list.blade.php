@extends('admin.layouts.default')

@section('content')
@foreach($tickets as $ticket)
<section @if($ticket->thread == 0) style="padding: 10px; border-radius: 5px; background: #abebff;" @endif >
    <h3><a href="{{URL::route('admin.ticket', array($ticket->id))}}">{{$ticket->item}}</a></h3>
    <p>{{$ticket->created_at}}</p>
    <div>{{$ticket->message}}</div>
</section>
@endforeach

@stop