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
        bootbox.confirm("Вы уверены что хотите купить данную линейку тарифа?", function(result) {
            console.log(result);
            if(result==true)
                window.location = path;
        });
    });

    $('a.buy_lin').click(function(e) {
        e.preventDefault();
        var path = $(this).attr('href');
        bootbox.confirm("Вы уверены что хотите купить данный линейный тариф?", function(result) {
            console.log(result);
            if(result==true)
                window.location = path;
        });
    });

});