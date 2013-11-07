@extends("site.layouts.default")

@section('content')

@include('site.private_header')
<div class="orders">
    <table class="refer table table-bordered table-striped lscl">
        <tr>
            <th>Введено</th>
            <th>Доступно</th>
            <th>Куплено</th>
            <th>Выведено</th>
            <th>В ожидании</th>
        </tr>
        <tr>
            <td>
                {{round($give, 2)}}$
            </td>
            <td>{{$balance}}$</td>
            <td>{{$buys}} </td>
            <td>0.00$</td>
            <td>0.00$</td>
        </tr>
    </table>
</div>
<div class="blocks_tarif1">
    <div>
        <div class="title">Купить тарифную линию</div>
    </div>
    <div class="tarcab">
        <div class="name">Red line</div>
        <div class="price">10 $</div>
        <ul class="control">
            <li><a href="#inv_red" data-toggle="modal">Инфо</a></li>

            <li><a class="buy" data-id="1" href="{{URL::route('user.deposites.buy', array(1))}}" data-limit="{{$inv[0]->limit}}" data-name="{{$inv[0]->name}} {{$inv[0]->cost}}$" data-bb="confirm">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab tarcab2">
        <div class="name">Orange line</div>
        <div class="price">35 $</div>
        <ul class="control">
            <li><a href="#inv_orange" data-toggle="modal">Инфо</a></li>

            <li><a class="buy" data-id="2" href="{{URL::route('user.deposites.buy', array(2))}}" data-limit="{{$inv[1]->limit}}" data-name="{{$inv[1]->name}} {{$inv[1]->cost}}$" data-bb="confirm">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab tarcab3">
        <div class="name">Yellow line</div>
        <div class="price">70 $</div>
        <ul class="control">
            <li><a href="#inv_yellow"  data-toggle="modal">Инфо</a></li>
            <li><a class="buy" data-id="3" href="{{URL::route('user.deposites.buy', array(3))}}" data-limit="{{$inv[2]->limit}}" data-name="{{$inv[2]->name}} {{$inv[2]->cost}}$" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
</div>
<div class="blocks_tarif2">
    <div class="tarcab tarcab4">
        <div class="name">Green line</div>
        <div class="price">110 $</div>
        <ul class="control">
            <li><a href="#inv_green"  data-toggle="modal">Инфо</a></li>
            <li><a class="buy" data-id="4" href="{{URL::route('user.deposites.buy', array(4))}}" data-limit="{{$inv[3]->limit}}" data-name="{{$inv[3]->name}} {{$inv[3]->cost}}$" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab tarcab5">
        <div class="name">Blue line</div>
        <div class="price">180 $</div>
        <ul class="control">
            <li><a href="#inv_blue"  data-toggle="modal">Инфо</a></li>
            <li><a class="buy" data-id="5" href="{{URL::route('user.deposites.buy', array(5))}}" data-limit="{{$inv[4]->limit}}" data-name="{{$inv[4]->name}} {{$inv[4]->cost}}$" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab tarcab6">
        <div class="name">Pink line</div>
        <div class="price">250 $</div>
        <ul class="control">
            <li><a href="#inv_pink"  data-toggle="modal">Инфо</a></li>
            <li><a class="buy" data-id="6" href="{{URL::route('user.deposites.buy', array(6))}}" data-limit="{{$inv[5]->limit}}" data-name="{{$inv[5]->name}} {{$inv[5]->cost}}$" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab tarcab7">
        <div class="name">Purple line</div>
        <div class="price">400 $</div>
        <ul class="control">
            <li><a href="#inv_purple"  data-toggle="modal">Инфо</a></li>
            <li><a class="buy" data-id="7" href="{{URL::route('user.deposites.buy', array(7))}}" data-limit="{{$inv[6]->limit}}" data-name="{{$inv[6]->name}} {{$inv[6]->cost}}$" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="inv_red" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cab">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Red line</h4>
            </div>
            <div class="modal-body">


                <table class="table table-bordered">
                    <tr>
                        <th>Название тарифа</th>
                        <th>Сумма</th>
                        <th>На 3-й день</th>
                        <th>На 6-й день</th>
                        <th>На 9-й день </th>
                        <th>На 12-й день</th>
                        <th>На 15-й день</th>
                        <th>На 18-й день</th>
                        <th>На 21-й день</th>
                        <th>На 24-й день</th>
                        <th>Чистая прибыль</th>
                        <th>Итого</th>
                    </tr>
                    <tr>
                        <td>Red line</td>
                        <td>10$</td>
                        <td>4$</td>
                        <td>3$</td>
                        <td>3$</td>
                        <td>1,5$</td>
                        <td>1,5$</td>
                        <td>1,5$</td>
                        <td>1,5$</td>
                        <td>1,5$</td>
                        <td>17,5$</td>
                        <td>7,5$</td>
                    </tr>
                </table>
                <p>Чистая прибыль составляет 7,5$</p>
                <p>Тарифная линия  Red line 10$  работает 24 календарных  дня с доходностью 75%. Депозит с прибылью делится на 8 частей и возвращается по одной части каждые три дня. </p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="inv_orange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cab">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Orange line</h4>
            </div>
            <div class="modal-body">


                <table class="table table-bordered">
                    <tr>
                        <th>Название тарифа</th>
                        <th>Сумма</th>
                        <th>На 3-й день</th>
                        <th>На 6-й день</th>
                        <th>На 9-й день </th>
                        <th>На 12-й день</th>
                        <th>На 15-й день</th>
                        <th>На 18-й день</th>
                        <th>На 21-й день</th>
                        <th>На 24-й день</th>
                        <th>Чистая прибыль</th>
                        <th>Итого</th>
                    </tr>
                    <tr>
                        <td>Orange line</td>
                        <td>35$</td>
                        <td>12$</td>
                        <td>9$</td>
                        <td>9$</td>
                        <td>4,5$</td>
                        <td>4,5$</td>
                        <td>4,5$</td>
                        <td>4,5$</td>
                        <td>4,5$</td>
                        <td>61,25$</td>
                        <td>26,25$</td>
                    </tr>
                </table>
                <p>Чистая прибыль составляет 26,25$</p>
                <p>Тарифная линия  Orange line 35$  работает 24 календарных  дня с доходностью 75%. Депозит с прибылью делится на 8 частей и возвращается по одной части каждые три дня. </p>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="inv_yellow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cab">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Yellow line</h4>
            </div>
            <div class="modal-body">


                <table class="table table-bordered">
                    <tr>
                        <th>Название тарифа</th>
                        <th>Сумма</th>
                        <th>На 3-й день</th>
                        <th>На 6-й день</th>
                        <th>На 9-й день </th>
                        <th>На 12-й день</th>
                        <th>На 15-й день</th>
                        <th>На 18-й день</th>
                        <th>На 21-й день</th>
                        <th>На 24-й день</th>
                        <th>Чистая прибыль</th>
                        <th>Итого</th>
                    </tr>
                    <tr>
                        <td>Yellow line</td>
                        <td>70$</td>
                        <td>28$</td>
                        <td>21$</td>
                        <td>21$</td>
                        <td>10,5$</td>
                        <td>10,5$</td>
                        <td>10,5$</td>
                        <td>10,5$</td>
                        <td>10,5$</td>
                        <td>122,5$</td>
                        <td>52,5$</td>
                    </tr>
                </table>
                <p>Чистая прибыль составляет 52,5$</p>
                <p>Тарифная линия  Yellow line 70$  работает 24 календарных  дня с доходностью 75%. Депозит с прибылью делится на 8 частей и возвращается по одной части каждые три дня. </p>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="inv_green" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cab">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Green line</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Название тарифа</th>
                        <th>Сумма</th>
                        <th>На 3-й день</th>
                        <th>На 6-й день</th>
                        <th>На 9-й день </th>
                        <th>На 12-й день</th>
                        <th>На 15-й день</th>
                        <th>На 18-й день</th>
                        <th>На 21-й день</th>
                        <th>На 24-й день</th>
                        <th>Чистая прибыль</th>
                        <th>Итого</th>
                    </tr>
                    <tr>
                        <td>Green line</td>
                        <td>110$</td>
                        <td>44$</td>
                        <td>33$</td>
                        <td>33$</td>
                        <td>16,5$</td>
                        <td>16,5$</td>
                        <td>16,5$</td>
                        <td>16,5$</td>
                        <td>16,5$</td>
                        <td>192,5$</td>
                        <td>82,5$</td>
                    </tr>
                </table>
                <p>Чистая прибыль составляет 82,5$</p>
                <p>Тарифная линия  Green line 110$  работает 24 календарных  дня с доходностью 75%. Депозит с прибылью делится на 8 частей и возвращается по одной части каждые три дня.</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="inv_blue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cab">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Blue line</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Название тарифа</th>
                        <th>Сумма</th>
                        <th>На 3-й день</th>
                        <th>На 6-й день</th>
                        <th>На 9-й день </th>
                        <th>На 12-й день</th>
                        <th>На 15-й день</th>
                        <th>На 18-й день</th>
                        <th>На 21-й день</th>
                        <th>На 24-й день</th>
                        <th>Чистая прибыль</th>
                        <th>Итого</th>
                    </tr>
                    <tr>
                        <td>Blue Line</td>
                        <td>180$</td>
                        <td>72$</td>
                        <td>54$</td>
                        <td>54$</td>
                        <td>27$</td>
                        <td>27$</td>
                        <td>27$</td>
                        <td>27$</td>
                        <td>27$</td>
                        <td>315$</td>
                        <td>135$</td>
                    </tr>
                </table>
                <p>Чистая прибыль составляет 135$</p>
                <p>Тарифная линия  Blue Line 180$  работает 24 календарных  дня с доходностью 75%. Депозит с прибылью делится на 8 частей и возвращается по одной части каждые три дня. </p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="inv_pink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cab">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Pink line</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Название тарифа</th>
                        <th>Сумма</th>
                        <th>На 3-й день</th>
                        <th>На 6-й день</th>
                        <th>На 9-й день </th>
                        <th>На 12-й день</th>
                        <th>На 15-й день</th>
                        <th>На 18-й день</th>
                        <th>На 21-й день</th>
                        <th>На 24-й день</th>
                        <th>Чистая прибыль</th>
                        <th>Итого</th>
                    </tr>
                    <tr>
                        <td>Pink line</td>
                        <td>250$</td>
                        <td>100$</td>
                        <td>75$</td>
                        <td>75$</td>
                        <td>27$</td>
                        <td>27$</td>
                        <td>27$</td>
                        <td>27$</td>
                        <td>27$</td>
                        <td>437,5$</td>
                        <td>187,5$</td>
                    </tr>
                </table>
                <p>Чистая прибыль составляет 187,5$</p>
                <p>Тарифная линия  Pink line 250$  работает 24 календарных  дня с доходностью 75%. Депозит с прибылью делится на 8 частей и возвращается по одной части каждые три дня. </p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="inv_purple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cab">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Purple line</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Название тарифа</th>
                        <th>Сумма</th>
                        <th>На 3-й день</th>
                        <th>На 6-й день</th>
                        <th>На 9-й день </th>
                        <th>На 12-й день</th>
                        <th>На 15-й день</th>
                        <th>На 18-й день</th>
                        <th>На 21-й день</th>
                        <th>На 24-й день</th>
                        <th>Чистая прибыль</th>
                        <th>Итого</th>
                    </tr>
                    <tr>
                        <td>Purple line</td>
                        <td>400$</td>
                        <td>160$</td>
                        <td>120$</td>
                        <td>120$</td>
                        <td>37,5$</td>
                        <td>37,5$</td>
                        <td>37,5$</td>
                        <td>37,5$</td>
                        <td>37,5$</td>
                        <td>700$</td>
                        <td>300$</td>
                    </tr>
                </table>
                <p>Чистая прибыль составляет 300$</p>
                <p>Тарифная линия  Purple line 400$  работает 24 календарных  дня с доходностью 75%. Депозит с прибылью делится на 8 частей и возвращается по одной части каждые три дня. </p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop