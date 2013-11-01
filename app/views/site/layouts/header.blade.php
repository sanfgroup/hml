<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
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
        @if(Auth::guest())
        <a href="#registration" data-toggle="modal" class="reg">Регистрация в проекте</a>
        @else
        <a href="{{URL::route('user.logout')}}" class="reg">Выход</a>
        @endif
        <!-- Контакты только на главной -->
        @if(Request::is('/'))
        <div class="contacts">
            <h3>СВЯЗЬ С НАМИ</h3>
            <ul>
                <li>
                    <p>Skype:</p>
                    <p>happymoneyline</p>
                </li>
                <li>
                    <p>Skype:</p>
                    <p>happymoney</p>
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
            @if(Auth::guest())
            <div class="container">
            @endif
                @include('site.layouts.menu')
                <div class="clearfix"></div>
                @if(Auth::guest())
            </div>
                @endif
            <a href="/" class="logo"></a>
            @if(Auth::guest())
            <a href="#login" data-toggle="modal" class="enter">Вход для клиентов <img src="/images/lock.png" alt=""></a>
            @else
<!--             <a href="{{URL::route('user.logout')}}" class="enter">Выход <img src="/images/lock.png" alt=""></a>-->
            @endif

        </nav>
    </header>
    <!-- header END -->