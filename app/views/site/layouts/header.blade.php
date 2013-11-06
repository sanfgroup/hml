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
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" ></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/bootbox.min.js"></script>
    <script type="text/javascript" src="/js/buyforms.js"></script>
    <script type="text/javascript">
        seconds = 0;
        minutes = 0;
        hours = 0;
        function update_clock(){
            $.post('/gettime.php',function(data){
                data = eval('('+data+')');
                seconds = data.s;
                minutes = data.m;
                hours = data.h;
                updateDiv(hours,minutes,seconds);
            });
        }

        function serverclock(){
            seconds++;
            if(seconds==60){
                seconds = 0;
                minutes++;
                if(minutes==60){
                    minutes = 0;
                    hours++;
                    if(hours==24){
                        hours = 0;
                    }
                }
                if(minutes%10==0){
                    update_clock();//Это функция, которая описана в самом верху.
                }
            }
            updateDiv(hours,minutes,seconds);
        }

        function updateDiv(hours,minutes,seconds){
            $('#timediv').html(zeroPad(hours,2)+":"+zeroPad(minutes,2)+":"+zeroPad(seconds,2));
        }

        function zeroPad(num,count){
            var numZeropad = num + '';
            while(numZeropad.length < count) {
                numZeropad = "0" + numZeropad;
            }
            return numZeropad;
        }
        update_clock();
        setInterval('serverclock()',1000);
    </script>
</head>
<body>
<div class="wrapper">
    <div class="ramka_top"></div>
    <header>
        <div class="site_name">
            <p>Репутация для нас - это верность своему слову!</p>
        </div>
        <div id="timediv"></div>
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
    <div style="position: fixed; bottom:0px;left: 0;width: 100%;z-index: 100000;background: #fff;text-align: center;">
        <h4>Сайт работает в тестовом режиме, всем пользователям начисляется 1000$ при регистрации. Перед запуском баланс будет обнулён и будет возможность пополнять и выводить деньги.</h4>
    </div>
    <!-- header END -->