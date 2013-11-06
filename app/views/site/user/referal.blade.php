@extends("site.layouts.default")

@section('content')

<div class="col-xs-5">

    <div class="banpar"></div>
    <p>Вас пригласил: <a href="">{{$user->refname}}</a></p>
    <p>Ваша реф-ссылка: <a href="{{$user->reflink}}">{{$user->reflink}}</a></p>
    <section>
        <div class="stata">
            <h4>Приглашенные Вами:</h4>
            <table>
                <tr>
                    <td colspan="2"><strong>Рефералов:</strong></td>
                </tr>
                <tr>
                    <td>1го уровня</td>
                    <td>{{$l1}}</td>
                </tr>
                <tr>
                    <td>2го уровня:</td>
                    <td>{{$l2}}</td>
                </tr>
                <tr>
                    <td>Получено денег:</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
    </section>
</div>
<div class="col-xs-7">
<!--    <a href=""><img src="/images/smallban.png" alt=""></a>-->
    <h3>Для вставки на форумы</h3>
    <div class="code">&lt;a href="{{$user->reflink}}"&gt;MyHappyLines&lt;/a&gt;</div>

    <table class="refer table table-bordered table-striped">
        <tr>
            <th>Пользователь</th>
            <th>E-Mail</th>
            <th>Skype</th>
            <th>Сумма</th>
        </tr>
        @foreach($ref as $v)
        <tr>
            <td>{{$v->username}}</td>
            <td>{{$v->email}}</td>
            <td>{{$v->skype}}</td>
            <td>0</td>
        </tr>
        @endforeach
        {{$ref->links()}}
    </table>

</div>
<div class="clearfix"></div>
@stop