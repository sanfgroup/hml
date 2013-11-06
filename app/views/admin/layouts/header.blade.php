<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <link href="/css/bootstrap-formhelpers.min.css" rel="stylesheet" media="screen">
    <link href="/css/chosen.min.css" rel="stylesheet" media="screen">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-formhelpers.min.js"></script>
    <script src="/js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootbox.min.js"></script>
    <title>Админка</title>
</head>
<body>
<header>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="#">Админка</a>
            <menu class="nav navbar-nav">
                <li><a href="{{URL::route('admin.news')}}">Новости</a></li>
                <li><a href="{{URL::route('admin.reviews')}}">Отзывы</a></li>
                <li><a href="{{URL::route('admin.user.index')}}">Пользователи</a></li>
                <li><a href="{{URL::route('admin.tickets')}}">Тикеты</a></li>
                <li><a href="/admin/statistic">Статистика</a></li>
                <li><a href="/admin/balance">Статистика начислений</a></li>
            </menu>
        </div>
    </nav>
</header>

