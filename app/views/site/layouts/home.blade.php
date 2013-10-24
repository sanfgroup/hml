@include("site.layouts.header")
<div class="container">
    <div class="content">
        @yield("content")
    </div>
    <div class="sidebar">
        <h2>НОВОСТИ</h2>
        @foreach($news as $k=>$v)
        <div class="onepost">
            <div class="post_date">
<!--                20 сентября 2013, 19:58-->
                {{$v->created_at}}
            </div>
            <h3>{{$v->title}}</h3>
            <div class="post_description">
                {{$v->short}}
                <a href="#" class="read_more">Читать полностью ...</a>
            </div>
        </div>
        @endforeach
<!--        -->

    </div>
    <div class="clear"></div>
</div>
@include("site.layouts.footer");