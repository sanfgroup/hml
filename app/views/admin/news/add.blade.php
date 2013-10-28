@extends('admin.layouts.default')

@section('content')
{{ Form::open() }}
    <input type="text" name="title">
    <textarea name="text" id="" cols="30" rows="10"></textarea>
    {{Form::submit('Submit!')}}
{{ Form::close() }}
@stop