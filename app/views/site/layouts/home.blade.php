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
            <h3>ПОЗДРАВЛЯЕМ С ОТКРЫТИЕМ ПРОЕКТА HAPPY LINE OF MONEY!!!</h3>
            <div class="post_description">
                <p>Уважаемые участники!</p>
                <p>Мы рады сообщить радостную новость! Сегодня наш сайт запускается в 21.30 МСК ! Сейчас участники имеют возможность регистрироваться в проекте и привлекать по своей реферальной ссылке новых участников.</p>
                <a href="#" class="read_more">Читать полностью ...</a>
            </div>
        </div>
        @endforeach
<!--        -->

    </div>
    <div class="clear"></div>
</div>
@include("site.layouts.footer");