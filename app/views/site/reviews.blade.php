@extends('site.layouts.default')

@section('content')
<h2>Отзывы</h2>
@foreach($reviews as $review)
<div class="one_rewiev">
    <div class="signature">
        <strong>{{$review->user->username}}</strong> <i>{{$review->created_at}}</i>
    </div>
    <div class="text_rewiev">
        {{$review->content}}
    </div>
</div>
@endforeach
@stop