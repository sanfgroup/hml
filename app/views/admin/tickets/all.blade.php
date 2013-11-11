@extends('admin.layouts.default')

@section('content')
<h3>Написать сообщение</h3>
<div class="row">
    <div class="col-xs-4">
        {{Form::open()}}
        <label for="theme">Тема:</label>
        <input type="text" name="item" id="item" class="form-control" />
        <label for="content">Текст сообщения:</label>
        <textarea name="content" id="content" class="form-control"></textarea>

        <button type="submit" class="btn btn-primary">Отправить</button>
        {{Form::close()}}
    </div>
    @if(isset($ticket))
    <div class="col-xs-6" style="float: right; padding: 10px; border-radius: 10px; border: 1px solid #aaaaaa; background: #eeeeee; height: 600px; overflow-y: auto;">
        <h3>{{$ticket->item}}</h3>

        <div>{{$ticket->message}}</div>
        <hr style="border-top: 1px solid #888;"/>
        @if(isset($ticketa) && $ticketa->id != '')
            <div  style="background: #fff;">{{$ticketa->message}}</div>
        @endif
    </div>
    @endif
</div>
@stop