<div style="text-align: center; margin: 65px 0 25px;">
    <div class="butBig bal">Ваш баланс: {{Auth::user()->balance}}$</div>
    <a href="#addMoney" data-toggle="modal" class="butBig addcash">Пополнить счет</a>
    <a href="" class="butBig get">Вывести деньги</a>
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