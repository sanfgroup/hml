@if(Auth::guest())
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
    <li class="l4"><a href="{{URL::route('rulers')}}">ПРАВИЛА</a></li>
</menu>
<menu class="right" style="margin-right: 50px;">
    <li class="l5"><a href="{{URL::route('news')}}">НОВОСТИ</a></li>
    <li class="l6"><a href="{{URL::route('reviews')}}">ОТЗЫВЫ</a></li>
    <li class="l7"><a href="{{URL::route('contacts')}}">КОНТАКТЫ</a></li>
</menu>
@else
<menu class="left">
    <li class="l1"><a href="{{URL::route('home')}}">ГЛАВНАЯ</a></li>
    <li class="l2">
        <a href="{{URL::route('user.profile')}}">ПРОФИЛЬ</a>
    </li>
    <li class="l3">
        <a href="#">ЛИЧНЫЙ КАБИНЕТ</a>
        <ul>
            <li><a href="{{URL::route('private.inv')}}">Инвестиционный</a></li>
            <li><a href="{{URL::route('private.linear')}}">Линейный</a></li>
        </ul>
    </li>
    <li class="l4"><a href="{{URL::route('user.deposites')}}">ДЕПОЗИТЫ</a></li>
</menu>
<menu class="right">
    <li class="l5"><a href="{{URL::route('user.history')}}">ИСТОРИЯ ОПЕРАЦИЙ</a></li>
    <li class="l6"><a href="{{URL::route('reviews')}}">ВАШИ РЕФЕРАЛЫ</a></li>
    <li class="l7"><a href="{{URL::route('user.review.add')}}">ОСТАВИТЬ ОТЗЫВ</a></li>
</menu>
@endif