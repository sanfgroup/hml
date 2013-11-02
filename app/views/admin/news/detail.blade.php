@extends('admin.layouts.default')

@section('content')



<section>
    <h2>{{$post->title}}</h2>
    <div>
        {{$post->content}}
    </div>
</section>

@stop