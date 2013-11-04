<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Happy Lines</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!--[if lt IE 9]>
    <script src="/js/dist/html5shiv.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" ></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/bootbox.min.js"></script>
    <script type="text/javascript" src="/js/buyforms.js"></script>

</head>
<body style="padding-top: 30px;">
<div class="wrapper">
    <div class="ramka_top"></div>
    <header>
        <div class="site_name">
            <p>Репутация для нас - это верность своему слову!</p>
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
                    <p>Skype Тех.поддержки:</p>
                    <p><a href="skype:myhappylines.support?add">myhappylines.support</a></p>
                </li>
                <li>
                    <p>Skype Фин.поддержки:</p>
                    <p><a href="skype:myhappylines.fin.support?add">myhappylines.fin.support</a></p>
                </li>
                <li>
                    <p>Email:</p>
                    <p><a href="mailto:support@myhappylines.com">support@myhappylines.com</a></p>
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
    <div style="position: fixed; top:0px;left: 0;width: 100%;z-index: 100000;background: #fff;text-align: center;">
        <h4>Сайт работает в тестовом режиме, всем пользователям начисляется 1000$ при регистрации. Перед запуском баланс будет обнулён и будет возможность пополнять и выводить деньги.</h4>
    </div>
    <!-- header END -->