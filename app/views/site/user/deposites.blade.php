@extends("site.layouts.default")

@section('content')
<br/><br/>
<div class="mark_desc">
    <h3>Инвестиционный маркетинг</h3>
    <p>В данной таблице вс статистические данные по вашим вкладам</p>
    <table>
        <tr>
            <th>Дата покупки</th>
            <th>Тарифный план</th>
            <th>Полученная сумма</th>
            <th>Следующее начисление</th>
            <th>Количество выплат</th>
            <th>Статус депозита</th>
        </tr>
        <tr>
            <td>10.10.2013 10:10:10</td>
            <td>Green line</td>
            <td>10$</td>
            <td>13.10.2013</td>
            <td>7</td>
            <td>Открыт</td>
        </tr>
    </table>
</div>
<div class="clear"></div>
<br/><br/><br/><br/><br/>
<div class="mark_desc">
    <h3>Линейный маркетинг</h3>
    <p>В данной таблице вс статистические данные по вашим вкладам</p>
    <table>
        <tr>
            <th>Тарифные планы</th>
            <th>Куплено тарифов</th>
            <th>На Сумму</th>
            <th>Закрыто тарифов</th>
            <th>Итого</th>
        </tr>
        <tr>
            <td>Light 5$</td>
            <td>2</td>
            <td>10$</td>
            <td>1</td>
            <td>10$</td>
        </tr>
        <tr>
            <td>Happy 10$</td>
            <td>2</td>
            <td>20$</td>
            <td>1</td>
            <td>20$</td>
        </tr>
        <tr>
            <td>Super 15$</td>
            <td>2</td>
            <td>30$</td>
            <td>1</td>
            <td>30$</td>
        </tr>
    </table>
</div>
<div class="clear"></div>
@stop