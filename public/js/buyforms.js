/**
 * Created by Jan on 02.11.13.
 */
$(document).ready(function(){
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

});