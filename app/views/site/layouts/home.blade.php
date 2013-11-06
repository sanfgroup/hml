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
            <div style="text-align:center; margin:0px; padding:0px; width:220px;"><embed src="//rg.revolvermaps.com/f/g.swf" type="application/x-shockwave-flash" pluginspage="//www.macromedia.com/go/getflashplayer" quality="high" wmode="window" allowScriptAccess="always" allowNetworking="all" width="220" height="220" flashvars="m=0&amp;i=6dpyzxd1g7m&amp;r=false&amp;v=false&amp;b=000000&amp;n=false&amp;s=220&amp;c=ff0000"></embed><br /><img src="http://jg.revolvermaps.com/c/6dpyzxd1g7m.gif" width="1" height="1" alt="" /><a href="http://www.revolvermaps.com/?target=enlarge&amp;i=6dpyzxd1g7m&amp;color=ff0000&amp;m=0">Large Visitor Globe</a></div>
        </div>

    </div>
    <div class="clear"></div>
</div>
@include("site.layouts.footer");