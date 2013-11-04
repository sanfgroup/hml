
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Здравствуйте {{$fio}}!</h2>

<div>

    <p>Вы приобрели линейный тариф {{$name}} {{$summa}} USD</p>
    <p>Для просмотра деталей операции пройдите по <a href="{{URL::route('user.history')}}">ссылке</a></p>

    <p>С уважением, команда <a href="https://Myhappylines.com">Myhappylines.com</a></p>
</div>
</body>
</html>