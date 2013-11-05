@extends("site.layouts.default")

@section('content')
<h2>Часто задаваемые вопросы</h2>
<div class="question">
    <div class="arrow_box">1. Что такое проект Myhappylines?</div>
    <div class="text_answer" style="display: none;">
        Проект Myhappylines - это финансовая система, основанная на принципе распределения денежных средств между участниками.
    </div>

</div>
<div class="question">
    <div class="arrow_box">2. Как я могу стать участником Myhappylines?</div>
    <div class="text_answer" style="display: none;">
        Для того, чтобы стать участником, Вам необходимо перейти по реферальной ссылке пригласителя или нажать кнопку РЕГИСТРАЦИЯ и заполнить все пункты в форме регистрации. Далее поставить галочку, что вы согласны с условиями системы (ОБЯЗАТЕЛЬНО ПРОЧИТАТЬ СОГЛАШЕНИЕ) и нажать на кнопку Зарегистрироваться.
    </div>

</div>
<div class="question">
    <div class="arrow_box">3. С какого возраста я могу участвовать в проекте?</div>
    <div class="text_answer" style="display: none;">
        В программе можно участвовать с 18 лет. Гражданство не имеет значения.
    </div>

</div>
<div class="question">
    <div class="arrow_box">4. С какими платежными системами работает проект?</div>
    <div class="text_answer" style="display: none;">
        Проект работает с платежными системами PerfectMoney, Okpay и SolidTrustPay.
    </div>

</div>
<div class="question">
    <div class="arrow_box">5. Могу ли я открыть несколько аккаунтов с моего ПК?</div>
    <div class="text_answer" style="display: none;">
        Нет, не можете! Если по техническим обстоятельствам Вы вынуждены регистрировать своих партнеров со своего компьютера - просим Вас об этом написать  в Техническую поддержку.
    </div>

</div>
<div class="question">
    <div class="arrow_box">6. Какие тарифные планы есть в проекте?</div>
    <div class="text_answer" style="display: none;">
        Смотрите разделы <a href="{{URL::route('marketing.inv')}}" >«Инвестиционный Маркетинг»</a>, <a href="{{URL::route('marketing.linear')}}">«Линейный Маркетинг»</a>
    </div>

</div>
<div class="question">
    <div class="arrow_box">7. Могу ли я участвовать сразу во всех тарифных линиях в инвестиционном маркетинге?</div>
    <div class="text_answer" style="display: none;">
        Да! Вы можете выбрать один из семи тарифных линий  и оплатить. Количество тарифных линий для одного участника неограниченно, но есть лимитные ограничения по маркетинг-плану.
    </div>

</div>
<div class="question">
    <div class="arrow_box">8. Что такое бонусная программа?</div>
    <div class="text_answer" style="display: none;">
        Бонусная программа позволяет заработать дополнительно при покупке необходимого количества тарифных линий. Более подробное описание бонусной программы смотрите в разделе <a href="{{URL::route('marketing.inv')}}" >«Маркетинг»</a>
    </div>

</div>
<div class="question">
    <div class="arrow_box">9. Что такое лимит на тарифные линии?</div>
    <div class="text_answer" style="display: none;">
        Для стабильной работы проекта существуют суточные лимиты на каждую тарифную линию. Лимиты будут со временем увеличиваться.
    </div>

</div>
<div class="question">
    <div class="arrow_box">10. Должен ли я иметь активный вклад , чтобы участвовать в партнерской программе?</div>
    <div class="text_answer" style="display: none;">
        Да, вы должны купить любую тарифную линию, чтобы приглашать партнеров.
    </div>

</div>
<div class="question">
    <div class="arrow_box">11. Если я не смогу никого пригласить, получу ли я деньги?</div>
    <div class="text_answer" style="display: none;">
        Да, получите! Существуют определенные сроки закрытия тарифных линий, прописанные в разделе <a href="{{URL::route('marketing.linear')}}">«Маркетинг»</a>.
    </div>

</div>
<div class="question">
    <div class="arrow_box">12. Приглашать новых участников обязательно для проекта?</div>
    <div class="text_answer" style="display: none;">
        Нет, необязательно, так как это дополнительный заработок для Вас в нашем проекте.  Но, старайтесь проявлять активность! Делайте новые вклады и привлекайте новых участников. Надеемся, что совместными усилиями мы сможем развивать наш проект!
    </div>

</div>
<div class="question">
    <div class="arrow_box">13. Могу ли я участвовать сразу во всех тарифных линиях в линейном маркетинге?</div>
    <div class="text_answer" style="display: none;">
        Да! Вы можете выбрать один из трех тарифов  и оплатить. Количество тарифов для одного участника неограниченно.
    </div>

</div>
<div class="question">
    <div class="arrow_box">14. Как я могу вывести средства?</div>
    <div class="text_answer" style="display: none;">
        Необходимо перейти в раздел «Личный кабинет", нажать на кнопку "Вывести" и указать сумму вывода. Таким образом, Вы создаете заявку на вывод. После обработки заявки, средства будут перечислены на счет, который вы указали.
    </div>

</div>
<div class="question">
    <div class="arrow_box">15. После того как я сделаю запрос на вывод средств, по истечении какого времени средства будут переведены на мой счёт?</div>
    <div class="text_answer" style="display: none;">
        Как правило, вывод денежных средств происходит в течение 24-48 часов.
    </div>

</div>
<div class="question">
    <div class="arrow_box">16. Какой минимальный и максимальный вывод в день?</div>
    <div class="text_answer" style="display: none;">
        Минимальный вывод составляет 1 доллар, максимальный вывод 500 долларов в сутки.
    </div>

</div>
<div class="question">
    <div class="arrow_box">17. Пополнив внутренний счет в личном кабинете и не купив тарифную линию, могу ли я вывести деньги на свой кошелек?</div>
    <div class="text_answer" style="display: none;">
        Нет, не можете. Пополнив счет в личном кабинете, вы обязаны купить любую тарифную линию или линейный тариф в живой очереди.
    </div>

</div>
<div class="question">
    <div class="arrow_box">18. Есть ли  комиссия на вывод  денежных средств?</div>
    <div class="text_answer" style="display: none;">
        Да, есть. Комиссия на вывод денежных средств составляет 5%.
    </div>

</div>
<div class="question">
    <div class="arrow_box">19. В проекте есть реферальная программа?</div>
    <div class="text_answer" style="display: none;">
        Да. В проекте есть 2-х уровневая реферальная программа:
        <br/>
        1 уровень – 7%
        <br/>
        2 уровень – 3%
    </div>

</div>
<div class="question">
    <div class="arrow_box">20. Как работает система, откуда берутся деньги для выплат?</div>
    <div class="text_answer" style="display: none;">
        Деньги на выплаты берутся от вновь приходящих участников проекта. Проект не ведет никакой второстепенной деятельности с вложениями ее участников.
    </div>

</div>
<div class="question">
    <div class="arrow_box">21. Что делать, если я не могу войти в свой аккаунт, потому что я забыл пароль?</div>
    <div class="text_answer" style="display: none;">
        Нажмите в верхнем меню "Вход", затем кнопку  "Восстановление пароля", введите свой   e-mail или логин, на почту придет новый пароль.
    </div>

</div>
<div class="question">
    <div class="arrow_box">22. Что мне делать, если я не нашел ответа на мой вопрос?</div>
    <div class="text_answer" style="display: none;">
        Обратитесь в нашу службу поддержки, используя  контактную форму!
    </div>

</div>
<!-- Пагинация -->
<!--<div class="pag">-->
<!--    <ul class="pagination">-->
<!--        <li class="disabled"><span>&laquo;</span></li>-->
<!--        <li class="active"><span>1</span></li>-->
<!--        <li><a href="#">2</a></li>-->
<!--        <li><a href="#">3</a></li>-->
<!--        <li><a href="#">&raquo;</a></li>-->
<!--    </ul>-->
<!--    <div class="line"></div>-->
<!--</div>-->
<!-- Пагинация -->
<script src="/js/akk.js"></script>
@stop