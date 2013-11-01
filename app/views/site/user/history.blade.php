@extends('site.layouts.default')


@section('content')
<div class="mark_desc">
    <h3>Инвестиционный маркетинг</h3>
    <p>В данной таблице </p>
    <table>
        <tr>
            <th>Дата</th>
            <th>Сумма</th>
            <th>Операция</th>
        </tr>
        @foreach($h as $v)
        <tr>
            <td>{{$v->created}}</td>
            <td>{{$v->summa}}$</td>
            <td>{{$v->description}}</td>
        </tr>
        @endforeach
    </table>
    {{$h->links()}}
</div>
<div class="clear"></div>
@stop