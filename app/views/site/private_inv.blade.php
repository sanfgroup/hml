@extends("site.layouts.default")

@section('content')

@include('site.private_header')
<div class="blocks_tarif1">
    <div>
        <div class="title">Купить тарифную линию</div>
    </div>
    <div class="tarcab">
        <div class="name">Red line</div>
        <div class="price">10 $</div>
        <ul class="control">
            <li><a href="#inv_red" data-toggle="modal">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(1))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Orange line</div>
        <div class="price">35 $</div>
        <ul class="control">
            <li><a href="#inv_orange" data-toggle="modal">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(2))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Yellow line</div>
        <div class="price">70 $</div>
        <ul class="control">
            <li><a href="#inv_yellow" data-toggle="modal">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(3))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
</div>
<div class="blocks_tarif2">
    <div class="tarcab">
        <div class="name">Green line</div>
        <div class="price">110 $</div>
        <ul class="control">
            <li><a href="#inv_green" data-toggle="modal">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(4))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Blue line</div>
        <div class="price">180 $</div>
        <ul class="control">
            <li><a href="#inv_blue" data-toggle="modal">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(5))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Pink line</div>
        <div class="price">250 $</div>
        <ul class="control">
            <li><a href="#inv_pink" data-toggle="modal">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(6))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
    <div class="tarcab">
        <div class="name">Purple line</div>
        <div class="price">400 $</div>
        <ul class="control">
            <li><a href="#inv_purple" data-toggle="modal">Инфо</a></li>
            <li><a class="buy" href="{{URL::route('user.deposites.buy', array(7))}}" data-toggle="confirmation">Купить</a></li>
        </ul>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="inv_red" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
                    </tr>
                </table>
                <p>Тарифная линия  Red line 10$  работает 24 календарных  дня с доходностью 75%. Депозит с прибылью делится на 8 частей и возвращается по одной части каждые три дня. </p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@stop