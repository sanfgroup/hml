@extends('admin.layouts.default')

@section('content')
@foreach($reviews as $review)
<h3>{{$review->user->username}}</h3>
<a href="{{URL::route('admin.review.delete', array($review->id))}}" class="btn btn-danger delete">Удалить</a>
<div style="padding: 10px; background: #efefef;">{{$review->content}}</div>

@endforeach
{{$reviews->links()}}
@stop