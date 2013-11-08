<script>
    $(document).ready(function(){
        $('#modalBuy').on('show', function() {
            var id = $(this).data('id'),
                removeBtn = $(this).find('.danger');
        })
        $('.confirm-buy').on('click', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#modalBuy').data('id', id).modal('show');
        });

        $('#btnYes').click(function() {
            // handle deletion here
            var id = $('#modalBuy').data('id');
            document.location.href = "{{URL::route('user.deposites.buy', array("+id+"))}}";
            $('#modalBuy').modal('hide');
        });
    });
</script>
<div style="text-align: center; margin: 65px 0 25px;">
    <div class="butBig bal">Ваш баланс: {{$user->balance}}$</div>
    <a href="#addMoney" data-toggle="modal" class="butBig addcash">Пополнить счет</a>
    <a href="#payMoney" data-toggle="modal" class="butBig get">Вывести деньги</a>
</div>
<div class="modal fade" id="addMoney" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Пополнение баланса</h4>
<!--                <h4>Пополнение счета будет возможно после открытия проекта</h4>-->
            </div>
            <div class="modal-body">
                <div>Сумма</div>

                <div class="payf">
                    <input id="get_summ" type="text" class="form-control"/>
                    {{$form}}
                    {{$form2}}
                </div>
                <div>С платежной системы</div>
                <button class="btn btn-primary" id="addPerfect">Perfectmoney</button>
                <button class="btn btn-primary" id="addOk">OKPAY</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="payMoney" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Вывод средств</h4>
<!--                <h4 class="modal-title">Выводить можно только заработаные деньги</h4>-->

            </div>
            {{Form::open(array('route'=>'user.payment', 'id'=>'tt'))}}
            <div class="modal-body">
                <div>Сумма</div>
                <input type="text" name="summ" id="take_money" class="form-control"/> <span id="procent"></span>
                <div>С платежной системы</div>
<!--                <div class="btn-group" data-toggle="buttons">-->

                    <label class="btn btn-primary" id="take">
                        Perfectmoney
                        <input type="radio" name="system" value="{{$user->perfectmoney}}">
                    </label>
                    <label class="btn btn-primary" id="takeok">
                        OKPAY
                        <input type="radio" name="system" value="{{$user->okpay}}">
                    </label>
<!--                </div>-->

            </div>

            {{Form::close()}}
        </div>
    </div>
</div>
