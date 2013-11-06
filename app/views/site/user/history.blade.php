@extends('site.layouts.default')


@section('content')
<br/>
<div class="mark_desc">
    <h3>История операций</h3>

    <table>
        <tr>
            <th>Дата</th>
            <th>Сумма</th>
            <th style="width:300px;">Операция</th>
        </tr>
        @foreach($h as $v)
        <tr>
            <td>{{$v->created}}</td>
            <td>{{$v->summas}}$</td>
            <td>{{$v->description}}</td>
        </tr>
        @endforeach
    </table>
    {{$h->links()}}
</div>
<div class="clear"></div>
@stop