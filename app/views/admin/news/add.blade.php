@extends('admin.layouts.default')

@section('content')

{{ Form::open() }}
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" name="title" class="form-control" placeholder="Название новости">
        <label for="text">Новость</label>
        <textarea name="text" id="" cols="30" rows="10" class="form-control" placeholder="Текст новости"></textarea>
        <input type="text" class="btn btn-primary" value="Добавить"/>
    </div>
{{ Form::close() }}

@stop