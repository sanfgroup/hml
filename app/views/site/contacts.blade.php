@extends("site.layouts.default")

@section('content')
<h2>Контакты</h2>
<p><strong>Связаться с нами</strong> вы можете любым удобным для вас способом:</p>
<p><strong>Skype: </strong>myhappylines.support</p>
<p><strong>Skype 2: </strong>myhappylines.fin.support</p>
<p><strong>E-mail: </strong>happyline@gmail.com</p>
<br>
<p><strong>А также, с помощью формы обратной связи:</strong></p>
<br>
<div class="contact_form">
    <div class="contactsName">
        Форма обратной связи
    </div>
    <form action="">
        <ul>
            <li><span>Ваше имя:</span><input type="text" name="your_name" id="your_name" class="form-control"></li>
            <li><span>Ваш e-mail:</span><input type="text" name="your_email" id="your_email" class="form-control"></li>
            <li><span>Тема:</span><input type="text" name="item" id="item" class="form-control"></li>
            <li><span>Сообщение:</span><textarea name="message" id="message" class="form-control" ></textarea></li>
        </ul>
        <button type="submit" >Отправить</button>
        <div class="clear"></div>
    </form>
</div>
@stop