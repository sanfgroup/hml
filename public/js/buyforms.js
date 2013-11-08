/**
 * Created by Jan on 02.11.13.
 */
$(document).ready(function(){
    bootbox.setDefaults({
       locale: 'ru'
    });
    $('#addPerfect').click(function(){

        $('#perfectForm').addClass('active');
        $('#okForm').removeClass('active');
        $('form.active').submit();
    });
    $('#addOk').click(function(){
        $('#okForm').addClass('active');
        $('#perfectForm').removeClass('active');
        $('form.active').submit();
    });
    $('#pay').click(function(){
        $('form.active').submit();
    });

    $('a.buy').click(function(e) {
        e.preventDefault();
        var path = $(this).attr('href');
        var limit = $(this).data('limit');
        var name = $(this).data('name');
        var id = $(this).data('id');
        if(id >= 4)
            return bootbox.alert("На данный момент тарифная линия недоступна. О дате открытия тарифной линии будет сообщено позже.", function(){});
        if(limit > 0) {
            bootbox.confirm("Вы уверены что хотите купить линейку тарифа "+name+"? Осталось "+limit+" тарифов.", function(result) {
                console.log(result);
                if(result==true)
                    window.location = path;
            });
        } else {
            bootbox.alert("Извините, лимит данной тарифной линии исчерпан. Открытие происходит каждый день в 12:30 мск и 19:30 мск!", function(){});
        }
    });

    $('a.buy_lin').click(function(e) {
        e.preventDefault();
        var path = $(this).attr('href');
        var name = $(this).data('name');
        bootbox.confirm("Вы уверены что хотите купить линейный тариф "+name+"?", function(result) {
            console.log(result);
            if(result==true)
                window.location = path;
        });
    });
    $('#take_money').keyup(function(){
        var summ = Number($(this).val());
        var q = (summ*0.95).toFixed(2);
        $('#procent').text('При выводе средств снимается комиссия 5%. Вывод составит '+q+'$');
//        (Math.ceil(summ*100)/100)
    });
    $('#take').click(function(){
        $('#take input').attr('checked','checked');
        $('#tt').submit();

    });
    $('#takeok').click(function(){
        $('#takeok input').attr('checked','checked');
        $('#tt').submit();

    });
    $('#get_summ').keyup(function(){
        var valu = $(this).val();
        $('#get_perfect').val(valu);
        $('#get_ok').val(valu);
    });
});