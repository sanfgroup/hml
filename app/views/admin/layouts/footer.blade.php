<script>
    $(function() {
        $('select').chosen();
        $('form button, form input[type=submit].pay, form input[type=submit].delete').click(function(e) {
            e.preventDefault();
            var b = $(this)
            bootbox.confirm("Вы уверены?", function(result) {
                if(result == true) {
                    b.parent().find('#ftype').val(b.attr('value'));
                    b.parent().submit();
                }
            });
        });
        $('a.delete, a.pay').click(function(e) {
            e.preventDefault();
            var b = $(this)
            bootbox.confirm("Вы уверены?", function(result) {
                if(result == true) window.location = b.attr('href');
            });
        });
    });
</script>
@if(Session::has('status'))
<script>
    bootbox.alert("{{Session::get('status')}}", function(){});
    setTimeout(function(){bootbox.hideAll()}, 2000);
</script>
@endif
</body>
</html>