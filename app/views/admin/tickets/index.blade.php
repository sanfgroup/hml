@extends('admin.layouts.default')

@section('content')
<h3>Написать сообщение</h3>
<div class="row">
    <div class="col-xs-4">
        {{Form::open()}}
        <label for="theme">Имя:</label>
        <input type="text" name="theme" id="theme" class="form-control" @if($user && $user != Auth::user()) value='{{$user->fio}}' @endif/>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" class="form-control" @if($user && $user != Auth::user()) value='{{$user->email}}' @endif />
        <label for="content">Текст сообщения:</label>
        <textarea name="content" id="content" class="form-control"></textarea>
        {{Form::close()}}
    </div>
    @if($user == Auth::user())
    <div class="col-xs-6" style="float: right; padding: 10px; border-radius: 10px; border: 1px solid #aaaaaa; background: #eeeeee; height: 600px; overflow-y: auto;">

    </div>
    @endif
</div>
@stop