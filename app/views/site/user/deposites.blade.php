@extends("site.layouts.default")

@section('content')
<br/><br/>
<div class="mark_desc">
    <h3>Инвестиционный маркетинг</h3>
    <p>В данной таблице все статистические данные по вашим вкладам</p>
    <table>
        <tr>
            <th>Дата покупки</th>
            <th>Тарифный план</th>
            <th>Полученная сумма</th>
            <th>Следующее начисление</th>
            <th>Количество выплат</th>
            <th>Статус депозита</th>
        </tr>
        @foreach($buys as $v)
        <tr>
            <td>{{$v->created}}</td>
            <td>{{$v->inv->name}} {{$v->summ}}$</td>
            <td>{{$v->inv->sumPayed($v->col)}}$</td>
            <td>{{$v->next}}</td>
            <td>{{$v->col}}/8</td>
            <td>
                @if($v->col < 7)
                Открыт
                @else
                Закрыт
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    {{$buys->links()}}
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
            <td>{{Auth::user()->linear5()->count()}}</td>
            <td>{{Auth::user()->linear5()->count()*5}}$</td>
            <td>{{Auth::user()->linear5()->wherePayed(1)->count()}}</td>
            <td>{{Auth::user()->linear5()->wherePayed(1)->count()*7.5}}$</td>
        </tr>
        <tr>
            <td>Happy 10$</td>
            <td>{{Auth::user()->linear10()->count()}}</td>
            <td>{{Auth::user()->linear10()->count()*10}}$</td>
            <td>{{Auth::user()->linear10()->wherePayed(1)->count()}}</td>
            <td>{{Auth::user()->linear10()->wherePayed(1)->count()*15}}$</td>
        </tr>
        <tr>
            <td>Super 15$</td>
            <td>{{Auth::user()->linear15()->count()}}</td>
            <td>{{Auth::user()->linear15()->count()*15}}$</td>
            <td>{{Auth::user()->linear15()->wherePayed(1)->count()}}</td>
            <td>{{Auth::user()->linear15()->wherePayed(1)->count()*22.5}}$</td>
        </tr>
    </table>
</div>
<div class="clear"></div>
@stop