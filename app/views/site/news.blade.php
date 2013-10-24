@extends("site.layouts.default")

@section("content")
<h2>НОВОСТИ</h2>
<div class="bigpost">
    <a href="#" class="name_post">Новые показатели популярности проекта</a>
    <div class="date_bp">22 октября 2013 г, 11:25</div>
    <div class="post_text">
        <p>Проект по своему теперешнему развитию опережает предыдущий! А это очень радует :)</p>
        <p>В общем одна из самых приятных новостей заключается в том, что буквально минут 40 назад БЫЛ СОЗДАН СКАЙП-ЧАТ №6!!!! Это воистину отличная новость! </p>
    </div>
    <a href="#" class="more_bp">Читать подробнее &raquo;</a>
</div>

<!-- Пагинация -->
<div class="pag">
    <ul class="pagination">
        <li class="disabled"><span>&laquo;</span></li>
        <li class="active"><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
    <div class="line"></div>
</div>
<!-- Пагинация -->
@stop