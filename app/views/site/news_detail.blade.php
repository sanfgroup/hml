@extends("site.layouts.default")

@section("content")
<div class="bigpost">
    <a href="#" class="name_post">{{$post->title}}</a>
    <div class="date_bp">
        <!--        22 октября 2013 г, 11:25-->
        {{$post->created_at}}
    </div>
    <div class="post_text">
        {{$post->content}}
    </div>
</div>
@stop