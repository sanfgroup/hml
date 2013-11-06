@extends('admin.layouts.default')

@section('content')
@foreach($reviews as $review)
<h3>{{$review->user->username}}</h3>
<div style="padding: 10px; ">{{$review->content}}</div>

@endforeach
@stop