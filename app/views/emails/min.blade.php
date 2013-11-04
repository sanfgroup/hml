<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Здравствуйте {{$fio}}!</h2>

<div>

    <p>Ваш баланс пополнен на {{$summa}} USD {{$system}}</p>
    <p>Для просмотра деталей операции пройдите по <a href="{{URL::route('user.history')}}">ссылке</a></p>

    <p>С уважением, команда <a href="https://Myhappylines.com">Myhappylines.com</a></p>
</div>
</body>
</html>