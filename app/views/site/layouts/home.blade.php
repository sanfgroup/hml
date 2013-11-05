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
                <a href="{{URL::route('news.detail', array($v->id))}}" class="read_more">Читать полностью ...</a>
            </div>
        </div>
        @endforeach
<!--        -->
        <img class="img-responsive" src="/img/refka.jpg" alt=""/>
        <div class="map">
            <script type="text/javascript" src="http://jf.revolvermaps.com/2/1.js?i=5hxax6hg01s&amp;s=240&amp;m=0&amp;v=true&amp;r=false&amp;b=000000&amp;n=false&amp;c=ff0000" async="async"></script>
        </div>

    </div>
    <div class="clear"></div>
</div>
@include("site.layouts.footer");