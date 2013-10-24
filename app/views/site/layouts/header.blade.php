
<nav>
    <div class="container">
        <menu class="left">
            <li class="l1"><a href="{{URL::route('home')}}">ГЛАВНАЯ</a></li>
            <li class="l2">
                <a href="">МАРКЕТИНГ</a>
                <ul>
                    <li><a href="#">Инвестиционный</a></li>
                    <li><a href="#">Линейный</a></li>
                </ul>
            </li>
            <li class="l3"><a href="{{URL::route('faq')}}">FAQ</a></li>
            <li class="l4"><a href="">ПРАВИЛА</a></li>
        </menu>
        <menu class="right">
            <li class="l5"><a href={{URL::route('news')}}"">НОВОСТИ</a></li>
            <li class="l6"><a href="">ОТЗЫВЫ</a></li>
            <li class="l7"><a href="">КОНТАКТЫ</a></li>
        </menu>
        <div class="clearfix"></div>
    </div>

    <a href="" class="logo"></a>
    <a href="" class="enter">Вход для клиентов <img src="images/lock.png" alt=""></a>
    <!-- <a href="" class="enter">Выход <img src="images/lock.png" alt=""></a>  -->

</nav>