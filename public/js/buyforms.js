/**
 * Created by Jan on 02.11.13.
 */
$(document).ready(function(){
    bootbox.setDefaults({
       locale: 'ru'
    });
    $('#addPerfect').click(function(){
        $('#addPerfect').addClass('disabled');
        $('#perfectForm').addClass('active');
        $('#okForm').removeClass('active');
        $('#addOk').removeClass('disabled');
    });
    $('#addOk').click(function(){
        $('#addOk').addClass('disabled');
        $('#okForm').addClass('active');
        $('#perfectForm').removeClass('active');
        $('#addPerfect').removeClass('disabled');
    });
    $('#pay').click(function(){
        $('form.active').submit();
    });

    $('a.buy').click(function(e) {
        e.preventDefault();
        var path = $(this).attr('href');
        var limit = $(this).data('limit');
        var name = $(this).data('name');
        console.log(limit);
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

});