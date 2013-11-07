@extends('admin.layouts.default')

@section('content')
<h3>Написать сообщение</h3>
<div class="row">
    <div class="col-xs-4">
        {{Form::open()}}
        <label for="theme">Имя:</label>
        <input type="text" name="theme" id="theme" class="form-control" @if($user && $user != Auth::user()) value='{{$user->fio}}' @elseif($ticket) value='{{$ticket->name}}' @endif/>
        <label for="theme">Тема:</label>
        <input type="text" name="item" id="item" class="form-control" @if($ticket) value="{{$ticket->item}}" @endif/>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" class="form-control" @if($user && $user != Auth::user()) value='{{$user->email}}' @elseif($ticket) value='{{$ticket->email}}' @endif />
        <label for="content">Текст сообщения:</label>
        <textarea name="content" id="content" class="form-control"></textarea>
        <button type="submit" class="btn btn-primary">Отправить</button>
        {{Form::close()}}
    </div>
    @if($ticket)
    <div class="col-xs-6" style="float: right; padding: 10px; border-radius: 10px; border: 1px solid #aaaaaa; background: #eeeeee; height: 600px; overflow-y: auto;">
        <h3>{{$ticket->item}}</h3>

        <div>{{$ticket->message}}</div>
    </div>
    @endif
</div>
@stop