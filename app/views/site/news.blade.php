@extends("site.layouts.default")

@section("content")
<h2>НОВОСТИ</h2>
@foreach($news as $k=>$v)
<div class="bigpost">
    <a href="{{URL::route('news.detail', array($v->id))}}" class="name_post">{{$v->title}}</a>
    <div class="date_bp">
<!--        22 октября 2013 г, 11:25-->
        {{$v->created_at}}
    </div>
    <div class="post_text">
        {{$v->short}}
    </div>
    <a href="#" class="more_bp">Читать подробнее &raquo;</a>
</div>
@endforeach
@if($news->links()!='')
<!-- Пагинация -->
<div class="pag">
    {{$news->links()}}
    <div class="line"></div>
</div>
<!-- Пагинация -->
@endif
@stop