@extends('admin.layouts.default')

@section('content')
@foreach($tickets as $ticket)
<section style=" margin: 10px 0;  padding: 10px; border-radius: 5px; @if($ticket->thread == 0) background: #F09D6F; @elseif($ticket->thwrite == 1) background: #97CC8A;  @elseif($ticket->thread == 1) background: #abebff;  @endif " >
    <h3><a href="{{URL::route('admin.ticket', array($ticket->id))}}">{{$ticket->item}}</a></h3>
    <p>{{$ticket->created_at}} @if($ticket->thwrite == 1) | Отвечено @endif | <a href="{{URL::route('admin.ticket.delete', array($ticket->id))}}">удалить</a></p>
    <div>{{$ticket->message}}</div>
</section>
@endforeach
{{$tickets->links()}}
@stop