<div style="text-align: center; margin: 65px 0 25px;">
    <div class="butBig bal">Ваш баланс: {{Auth::user()->balance}}$</div>
    <a href="#addMoney" data-toggle="modal" class="butBig addcash">Пополнить счет</a>
    <a href="#payMoney" data-toggle="modal" class="butBig get">Вывести деньги</a>
</div>
<div class="modal fade" id="addMoney" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Пополнение баланса</h4>
            </div>
            <div class="modal-body">
                <div>Сумма</div>

                <div class="payf">
                    {{$form}}
                    {{$form2}}
                </div>
                <div>С платежной системы</div>
                <button class="btn btn-primary disabled" id="addPerfect">Perfectmoney</button>
                <button class="btn btn-primary" id="addOk">OKPAY</button>

            </div>
            <div class="modal-footer">
                <button id="pay" class="btn btn-warning">
                    Пополнить
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="payMoney" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Пополнение баланса</h4>
            </div>
            {{Form::open(array('url'=>''))}}
            <div class="modal-body">
                <div>Сумма</div>
                <input type="text" name="summ"/>
                <div>С платежной системы</div>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="radio" checked="checked" name="system" value="{{Auth::user()->perfectmoney}}"> Perfectmoney
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="system" value="{{Auth::user()->okpay}}"> OKPAY
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