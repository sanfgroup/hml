<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Здравствуйте {{$fio}}!</h2>

<div>


    Вам начислено реферальное вознаграждение {{$summa}} USD (реферал: {{$referal}})
    Для просмотра деталей операции пройдите по <a href="{{URL::route('user.history')}}">ссылке</a>

    С уважением, команда <a href="https://Myhappylines.com">Myhappylines.com</a>
</div>
</body>
</html>