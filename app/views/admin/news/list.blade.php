@extends('admin.layouts.default')

@section('content')
@foreach($posts as $post)
<section>
    <h2><a href="{{URL::route('admin.new.detail', array($post->id))}}">{{$post->title}}</a></h2>
    <a href="{{URL::route('admin.news.delete', array($post->id))}}">Удалить</a> | <a href="{{URL::route('admin.addNews', array($post->id))}}">Редактировать</a>
    <div>
        {{$post->short}}
    </div>
</section>
@endforeach
{{$posts->links()}}
@stop