<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <title>Админка</title>
</head>
<body>
<header>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="#">Админка</a>
            <menu class="nav navbar-nav">
                <li><a href="{{URL::route('admin.addNews')}}">Добавить новость</a></li>
                <li><a href="{{URL::route('admin.news')}}">Новости</a></li>
            </menu>
        </div>
    </nav>
</header>

