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
            <td>{{$v->inv->name}} {{$v->inv->cost}}$</td>
            <td>{{$v->inv->sumPayed($v->col)}}$</td>
            <td>{{$v->next}} 20:00 МСК</td>
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
<br/><br/><br/>
<div class="mark_desc">
    <h3>Линейный маркетинг</h3>
    <p>В данной таблице все статистические данные по вашим вкладам</p>
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
            <td>{{$user->linear5()->remember(5)->count()}}</td>
            <td>{{$user->linear5()->remember(5)->count()*5}}$</td>
            <td>{{$user->linear5()->remember(5)->wherePayed(1)->count()}}</td>
            <td>{{$user->linear5()->remember(5)->wherePayed(1)->count()*7.5}}$</td>
        </tr>
        <tr>
            <td>Happy 10$</td>
            <td>{{$user->linear10()->remember(5)->count()}}</td>
            <td>{{$user->linear10()->remember(5)->count()*10}}$</td>
            <td>{{$user->linear10()->remember(5)->wherePayed(1)->count()}}</td>
            <td>{{$user->linear10()->remember(5)->wherePayed(1)->count()*15}}$</td>
        </tr>
        <tr>
            <td>Super 15$</td>
            <td>{{$user->linear15()->remember(5)->count()}}</td>
            <td>{{$user->linear15()->remember(5)->count()*15}}$</td>
            <td>{{$user->linear15()->remember(5)->wherePayed(1)->count()}}</td>
            <td>{{$user->linear15()->remember(5)->wherePayed(1)->count()*22.5}}$</td>
        </tr>
    </table>
</div>
<div class="clear"></div>
<br/>
<br/>
<br/>
<div class="mark_desc">
    <h3>Бонусная программа</h3>
    <table>
        <tr>
            <th>Тарифные планы</th>
            <th>Приобретенные вами тарифы</th>
        </tr>
        <tr>
            <td>Red line 10$</td>
            <td>0/70</td>
        </tr>
        <tr>
            <td>Orange line 35</td>
            <td>0/35</td>
        </tr>
        <tr>
            <td>Yellow line 70$</td>
            <td>0/20</td>
        </tr>
        <tr>
            <td>Green line 110$</td>
            <td>0/15</td>
        </tr>
        <tr>
            <td>Blue Line 180$</td>
            <td>0/12</td>
        </tr>
        <tr>
            <td>Pink line 250$</td>
            <td>0/11</td>
        </tr>
        <tr>
            <td>Purple line 400$</td>
            <td>0/10<!--{{$user->countInv(7)}}--></td>
        </tr>
    </table>
</div>
<div class="clear"></div>
@stop