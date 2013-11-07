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
<!--                <h4 class="modal-title">Пополнение баланса</h4>-->
                <h4>Пополнение счета будет возможно после открытия проекта</h4>
            </div>
   <!--         <div class="modal-body">
                <div>Сумма</div>

                <div class="payf">
                    $form
                    $form2
                </div>
                <div>С платежной системы</div>
                <button class="btn btn-primary disabled" id="addPerfect">Perfectmoney</button>
                <button class="btn btn-primary" id="addOk">OKPAY</button>

            </div>
            <div class="modal-footer">
                <button id="pay" class="btn btn-warning">
                    Пополнить
                </button>
            </div>-->
        </div>
    </div>
</div>
<div class="modal fade" id="payMoney" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Вывод средств</h4>
                <!--<h4 class="modal-title">Вывод средств будет доступен после открытия пороекта</h4>-->

            </div>
            {{Form::open(array('route'=>'user.payment'))}}
            <div class="modal-body">
                <div>Сумма</div>
                <input type="text" name="summ" class="form-control"/>
                <div>С платежной системы</div>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="radio" checked="checked" name="system" value="{{$user->perfectmoney}}"> Perfectmoney
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="system" value="{{$user->okpay}}"> OKPAY
                    </label>
                </div>

            </div>
            <div class="modal-footer">
                <button id="pay" type="submit" class="btn btn-warning">
                    Вывести
                </button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
