@extends('admin.layouts.default')

@section('content')
<div class="row">
    <h1>Протолкнуть очередь</h1>
    <div class="row">
        <div class="col-xs-3">
            Light 5$
            {{ Form::open(array('url' => 'admin/statistic/process')) }}
            <input type="hidden" name="type" value='l5'/>
            <input type="text" name="count" class="form-control" value="1"/>
            <input class="btn btn btn-primary" type="submit"/>
            {{Form::close()}}
        </div>
        <div class="col-xs-3">
            Happy 10$
            {{ Form::open(array('url' => 'admin/statistic/process')) }}
            <input type="hidden" name="type" value='l10'/>
            <input type="text" name="count" class="form-control" value="1"/>
            <input class="btn btn btn-primary" type="submit"/>
            {{Form::close()}}
        </div>
        <div class="col-xs-3">
            Super 15$
            {{ Form::open(array('url' => 'admin/statistic/process')) }}
            <input type="hidden" name="type" value='l15'/>
            <input type="text" name="count" class="form-control" value="1"/>
            <input class="btn btn btn-primary" type="submit"/>
            {{Form::close()}}
        </div>
    </div>
    <br/><br/><br/><br/>
    {{ Form::open(array('url' => 'admin/statistic')) }}
    <div class="col-xs-3">
        <p>С даты:</p>
        <div class="bfh-datepicker" data-format="y-m-d" data-date="today">
            <div class="input-group bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" name="date_from" class="form-control" readonly>
            </div>
            <div class="bfh-datepicker-calendar">
                <table class="calendar table table-bordered">
                    <thead>
                    <tr class="months-header">
                        <th class="month" colspan="4">
                            <a class="previous" href="#"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <span></span>
                            <a class="next" href="#"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        </th>
                        <th class="year" colspan="3">
                            <a class="previous" href="#"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <span></span>
                            <a class="next" href="#"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        </th>
                    </tr>
                    <tr class="days-header">
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <p>До даты</p>
        <div class="bfh-datepicker" data-format="y-m-d" data-date="today">
            <div class="input-group bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" name="date_to" class="form-control" readonly>
            </div>
            <div class="bfh-datepicker-calendar">
                <table class="calendar table table-bordered">
                    <thead>
                    <tr class="months-header">
                        <th class="month" colspan="4">
                            <a class="previous" href="#"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <span></span>
                            <a class="next" href="#"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        </th>
                        <th class="year" colspan="3">
                            <a class="previous" href="#"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <span></span>
                            <a class="next" href="#"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        </th>
                    </tr>
                    <tr class="days-header">
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <p>
        <button type="submit" class="btn btn-primary">Поиск</button>
    </p>
    {{Form::close()}}
</div>
<h1>За период с {{$date_f}} до {{$date_t}}</h1>
<p>Пользователей: {{$users->count()}}</p>
<p>Ввели в систему: {{round(Balance::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->where('type', 1)->sum('summa'),2)}} $</p>
<p>Вывели из системы: {{abs(round(Balance::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->where('type', 2)->sum('summa'),2))}} $</p>
<p>Ожидает вывода: {{abs(round(Payment::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->where('payed', 0)->sum('summa'),2))}} $</p>
<p>Реферальных комиссионных: {{abs(round(Balance::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->where('referal_id', '!=', 0)->sum('summa'),2))}} $</p>
<p>Отчисления 5%: {{round(Balance::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->where('type', 15)->sum('summa'),2)}} $</p>
<p>В финансовой подушке: {{Balance::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->where('user_id', '0')->whereType(0)->sum('summa')}} $</p>

<br/>
<br/>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Название</th>
        <th>Куплено</th>
        <th>Выплачено</th>
        <th>Пользователи потратил</th>
        <th>Выплачено на внутренней кошелек</th>
        <th>Итого в системе осталось</th>
    </tr>
    </thead>
    <tbody>
    @foreach($linear as $l)
    <tr>
        <td>{{$l['name']}}</td>
        <td>{{$l['buys']}}</td>
        <td>{{$l['payed']}}</td>
        <td>{{$l['mm']}}$</td>
        <td>{{$l['mp']}}$</td>
        <td>{{$l['total']}}$</td>
    </tr>
    @endforeach
    </tbody>
</table>
<br/>
<br/>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Название</th>
        <th>Куплено</th>
        <th>Пользователи потратил</th>
        <th>Выплачено на внутренней кошелек</th>
        <th>Итого в системе осталось</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invs as $v)
    <tr>
        <td>{{$v['name']}}</td>
        <td>{{$v['buys']}}</td>
        <td>{{$v['mm']}}$</td>
        <td>{{$v['mp']}}$</td>
        <td>{{$v['total']}}$</td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop