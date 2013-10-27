
<!-- footer begin -->
<div class="empty"></div>
<div class="ramka_bottom"></div>
</div>
<footer>
    <a href="/" class="flogo"><img src="/images/logo_bottom.png" alt=""></a>
    <p class="all">Copyright 2013.Все права защищены.</p>
    <div class="pays">
        <a href=""><img src="/images/pfm.png" alt=""></a>
        <a href=""><img src="/images/okpay.png" alt=""></a>
        <a href=""><img src="/images/solidtr.png" alt=""></a>
    </div>
    <a href="" class="mmgp"><img src="/images/mmgp.png" alt=""></a>
    <div class="socn"><a href="" class="btn">Мы в Facebook <img src="/images/fbi.png" alt=""></a><a href="" class="btn">Мы Вконтакте <img src="/images/vki.png" alt=""></a></div>
</footer>
@if(Auth::guest())
<div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Регистрация в проекте</h4>
            </div>
            {{ Form::open(array('route' => 'user.reg', 'method' => 'POST')) }}
            <div class="modal-body">
                <ul>
                    <li>
                        {{ Form::label('fio', 'Фамилия Имя Отчество:') }}
                        {{ Form::text('fio', null, array('class'=>'form-control')) }}
                    </li>
                    <li>
                        {{ Form::label('username', 'Логин:') }}
                        {{ Form::text('username', null, array('class'=>'form-control')) }}
                    </li>
                    <li>
                        {{ Form::label('password', 'Пароль:') }}
                        {{ Form::text('password', null, array('class'=>'form-control')) }}
                    </li>
                    <li>
                        {{ Form::label('password_confirmation', 'Подтверждение пароля:') }}
                        {{ Form::text('password_confirmation', null, array('class'=>'form-control')) }}
                    </li>
                    <li>
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::text('email', null, array('class'=>'form-control')) }}
                    </li>
<!--                    <li>-->
<!--                        {{ Form::label('referal_id', 'Referal_id:') }}-->
<!--                        {{ Form::text('referal_id') }}-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        {{ Form::label('okpay', 'Okpay:') }}-->
<!--                        {{ Form::text('okpay') }}-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        {{ Form::label('perfectmoney', 'Perfectmoney:') }}-->
<!--                        {{ Form::text('perfectmoney') }}-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        {{ Form::label('solidtrustpay', 'Solidtrustpay:') }}-->
<!--                        {{ Form::text('solidtrustpay') }}-->
<!--                    </li>-->
                </ul>
            </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Зарегистрироватся</button>
            </div>
                {{ Form::close() }}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif
</body>
</html>