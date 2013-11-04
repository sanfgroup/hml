@extends("site.layouts.default")

@section('content')

<div class="col-xs-5">

    <div class="banpar"></div>
<!--    <p>Вас пригласил: <a href="">admin</a></p>-->
    <p>Ваша реф-ссылка: <a href="{{Auth::user()->reflink}}">{{Auth::user()->reflink}}</a></p>
    <section>
        <div class="stata">
            <h4>Приглашенные Вами:</h4>
            <table>
                <tr>
                    <td>Рефералов:</td>
                    <td>{{Auth::user()->referral()->count()}}</td>
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
    <div class="code">&lt;a href="{{Auth::user()->reflink}}"&gt;MyHappyLines&lt;/a&gt;</div>

    <table class="refer table table-bordered table-striped">
        <tr>
            <th>Пользователь</th>
            <th>E-Mail</th>
            <th>Skype</th>
            <th>Сумма</th>
        </tr>
        @foreach(Auth::user()->referral()->get() as $v)
        <tr>
            <td>{{$v->username}}</td>
            <td>{{$v->email}}</td>
            <td>{{$v->skype}}</td>
            <td>0</td>
        </tr>
        @endforeach
    </table>

</div>
<div class="clearfix"></div>
@stop