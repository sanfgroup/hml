@extends('admin.layouts.default')

@section('content')
<div class="row">
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
<p>Ввели в систему: {{Balance::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->where('type', 1)->sum('summa')}} $</p>
<p>В финансовой подушке: {{Balance::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->where('user_id', '0')->sum('summa')}} $</p>
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
    <tr>
        <td>Линейный 5$</td>
        <td>{{$linear5->count()}}</td>
        <td>{{$linear5->count()*5}} $</td>
        <td>{{Linear5::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->where('payed', 1)->where('admin', 0)->count()*7.5}} $</td>
        <td>{{($linear5->count()*5) - (Linear5::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->where('payed', 1)->where('admin', 0)->count()*7.5)}} $</td>
    </tr>
    <tr>
        <td>Линейный 10$</td>
        <td>{{$linear10->count()}}</td>
        <td>{{$linear10->count()*10}} $</td>
        <td>{{Linear10::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->where('payed', 1)->where('admin', 0)->count()*15}} $</td>
        <td>{{($linear10->count()*10) - (Linear10::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->where('payed', 1)->where('admin', 0)->count()*15)}} $</td>
    </tr>
    <tr>
        <td>Линейный 15$</td>
        <td>{{$linear15->count()}}</td>
        <td>{{$linear15->count()*15}} $</td>
        <td>{{Linear15::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->where('payed', 1)->where('admin', 0)->count()*22.5}} $</td>
        <td>{{($linear15->count()*15) - (Linear15::where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->where('payed', 1)->where('admin', 0)->count()*22.5)}} $</td>
    </tr>
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
    @foreach($inv as $v)
    <tr>
        <td>{{$v->name}}</td>
        <td>{{$v->buys()->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->count()}}</td>
        <td>{{$v->buys()->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->count()*$v->cost}} $</td>
        <td>{{$v->totalPayed($date_f, $date_t)}} $</td>
        <td>{{($v->buys()->where('created_at', '>=', $date_f)->where('created_at', '<=', $date_t)->remember(10)->count()*$v->cost) - ($v->totalPayed($date_f, $date_t))}} $</td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop