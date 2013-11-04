
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
    <div class="modal-dialog" style="width: 520px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Регистрация в проекте</h4>
            </div>
            {{ Form::open(array('route' => 'user.reg', 'method' => 'POST')) }}
            <div class="modal-body">
                @if($errors->count() > 0)
                <div class="alert alert-danger">
                    @foreach( $errors->all() as $message )
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif
                <ul>
                    <li>
                        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('fio', 'Фамилия Имя') }}

                        <input type="text" id="fio" name="fio" class="form-control" value="{{Input::old('fio')}}" />
                    </li>
                    <li>
                        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('username', 'Логин') }}
                        {{ Form::text('username', Input::old('username'), array('class'=>'form-control')) }}
                    </li>
                    <li>
                        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('password', 'Пароль') }}
<!--                        {{ Form::password('password', null, array('class'=>'form-control')) }}-->
                        <input type="password" name="password" id="password" class="form-control" value="{{Input::old('password')}}" />
                    </li>
                    <li>
                        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('password_confirmation', 'Подтверждение пароля') }}
<!--                        {{ Form::password('password_confirmation', null, array('class'=>'form-control')) }}-->
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                    </li>
                    <li>
                        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('email', 'Электронная почта') }}
                        {{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
                    </li>
                    <li>
                        <span style="float: left; color: #ff0000;">* </span>{{Form::label('skype', 'Skype')}}
                        {{ Form::text('skype', Input::old('email'), array('class'=>'form-control')) }}
                    </li>

<!--                    <li>-->
<!--                       {{ Form::label('referal_id', 'Referal_id:') }}-->
<!--                       {{ Form::text('referal_id') }}-->
<!--                    </li>-->
                    <li>
                        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('perfectmoney', 'Perfectmoney') }}
                        @if(Input::old('perfectmoney'))
                        {{ Form::text('perfectmoney', Input::old('perfectmoney'), array('class'=>'form-control')) }}
                        @else
                        {{ Form::text('perfectmoney', 'U', array('class'=>'form-control')) }}
                        @endif
                    </li>

                    <li>
                        {{ Form::label('okpay', 'Okpay') }}
                        @if(Input::old('okpay'))
                        {{ Form::text('okpay', Input::old('okpay'), array('class'=>'form-control')) }}
                        @else
                        {{ Form::text('okpay', 'OK', array('class'=>'form-control')) }}
                        @endif
                    </li>

                    <li>
                        {{ Form::label('referral', 'Логин пригласителя') }}
                        {{ Form::text('referral', Session::get('ref', ''), array('class'=>'form-control')) }}
                    </li>
                    <li>
                        {{Form::checkbox('conf', 'yes')}}&nbsp;Вы принимаете <a href="{{URL::route('rulers')}}" target="_blank" style="color: #fff; text-decoration: underline;">соглашение</a>
                    </li>


                    <li>
                        <span style="float: left; color: #ff0000;">* </span>{{ Form::label('captcha', 'Введите капчу') }}
                    </li>
                    <li style="float: left; margin-right: 10px;">{{HTML::image(Captcha::img(), 'Captcha image')}}</li>
                    <li style="float: left; ">{{Form::text('captcha', null, array('class'=>'form-control', 'style'=>'width:120px'))}}</li>
                </ul>
                <div class="clearfix"></div>
            </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </div>
                {{ Form::close() }}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog login">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Авторизация</h4>
            </div>
            {{ Form::open(array('route' => 'user.login', 'method' => 'POST')) }}
            <div class="modal-body">

                @if(Session::has('flash_login'))
                <div class="alert alert-danger">
                    <p>{{Session::get('flash_login')}}</p>
                </div>
                @endif
                <ul>
                    <li>
                        {{ Form::label('username', 'Логин') }}
                        {{ Form::text('username', null, array('class'=>'form-control')) }}
                    </li>
                    <li>
                        {{ Form::label('password', 'Пароль') }}

                        <input name="password" type="password" value="" id="password" class="form-control">
                    </li>
                    <li>
                        {{ Form::label('captcha', 'Введите капчу') }}
                    </li>
                    <li style="float: left; margin-right: 10px;">{{HTML::image(Captcha::img(), 'Captcha image')}}</li>
                    <li style="float: left;">{{Form::text('captcha', null, array('class'=>'form-control', 'style'=>'width:120px'))}}</li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <a href="#rp" data-toggle="modal" class="restore">Восстановление пароля</a>
                <button type="submit" class="btn btn-primary">Войти</button>
            </div>
            {{ Form::close() }}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="rp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog login">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Восстановление пароля</h4>
            </div>
            {{ Form::open(array('route' => 'user.recovery', 'method' => 'POST')) }}
            <div class="modal-body">

                @if(Session::has('flash_login'))
                <div class="alert alert-danger">
                    <p>{{Session::get('flash_login')}}</p>
                </div>
                @endif
                <ul>
                    <li>
                        {{ Form::label('email', 'EMail') }}
                        {{ Form::text('email', null, array('class'=>'form-control')) }}
                    </li>
                    <li>
                        {{ Form::label('captcha', 'Введите капчу') }}
                    </li>
                    <li style="float: left; margin-right: 10px;">{{HTML::image(Captcha::img(), 'Captcha image')}}</li>
                    <li style="float: left;">{{Form::text('captcha', null, array('class'=>'form-control', 'style'=>'width:120px'))}}</li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Восстановить</button>
            </div>
            {{ Form::close() }}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    @if($errors->count() > 0)
    <script>
        $(function(){
            $('#registration').modal('show')
        });
    </script>
    @endif
    @if(Session::has('flash_reg') || Session::has('flash_login'))
    <script>
        $(function(){
            $('#login').modal('show')
        });
    </script>
    @endif
@endif



</body>
</html>