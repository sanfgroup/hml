@extends('admin.layouts.default')

@section('content')
{{Form::open()}}
<input type="text" name="theme" id="theme" class="form-control"/>
<input type="text" name="email" id="email" class="form-control"/>

{{Form::close()}}
@stop