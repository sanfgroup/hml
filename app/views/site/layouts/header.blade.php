<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!--[if lt IE 9]>
    <script src="/js/dist/html5shiv.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" ></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="ramka_top"></div>
    <header>
        <div class="site_name">
            <p>Нам доверяют свои деньги</p>
            <p>397<!-- вставить количество вкладчиков  --> партнеров</p>
        </div>
        <a href="" class="reg">Регистрация в проекте <!-- Личный кабинет --></a>
        <!-- Контакты только на главной -->
        @if(Request::is('/'))
        <div class="contacts">
            <h3>СВЯЗЬ С НАМИ</h3>
            <ul>
                <li>
                    <p>Skype:</p>
                    <p>happylineofmoney</p>
                </li>
                <li>
                    <p>Skype:</p>
                    <p>+91 9123456789</p>
                </li>
                <li>
                    <p>Email:</p>
                    <p>happyline@gmail.com</p>
                </li>
            </ul>
        </div>
        @endif
        <!-- Конец контактов -->
        <nav>
            <div class="container">
                <menu class="left">
                    <li class="l1"><a href="{{URL::route('home')}}">ГЛАВНАЯ</a></li>
                    <li class="l2">
                        <a href="#">МАРКЕТИНГ</a>
                        <ul>
                            <li><a href="{{URL::route('marketing.inv')}}">Инвестиционный</a></li>
                            <li><a href="{{URL::route('marketing.linear')}}">Линейный</a></li>
                        </ul>
                    </li>
                    <li class="l3"><a href="{{URL::route('faq')}}">FAQ</a></li>
                    <li class="l4"><a href="">ПРАВИЛА</a></li>
                </menu>
                <menu class="right">
                    <li class="l5"><a href="{{URL::route('news')}}">НОВОСТИ</a></li>
                    <li class="l6"><a href="{{URL::route('reviews')}}">ОТЗЫВЫ</a></li>
                    <li class="l7"><a href="{{URL::route('contacts')}}">КОНТАКТЫ</a></li>
                </menu>
                <div class="clearfix"></div>
            </div>

            <a href="" class="logo"></a>
            <a href="" class="enter">Вход для клиентов <img src="images/lock.png" alt=""></a>
            <!-- <a href="" class="enter">Выход <img src="images/lock.png" alt=""></a>  -->

        </nav>
    </header>
    <!-- header END -->