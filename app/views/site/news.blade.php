@extends("site.layouts.default")

@section("content")
<h2>НОВОСТИ</h2>
@foreach($news as $k=>$v)
<div class="bigpost">
    <a href="#" class="name_post">{{$v->title}}</a>
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
<!-- Пагинация -->
<div class="pag">
    <ul class="pagination">
        <li class="disabled"><span>&laquo;</span></li>
        <li class="active"><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
    <div class="line"></div>
</div>
<!-- Пагинация -->
@stop