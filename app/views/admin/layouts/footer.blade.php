<script>
    $(function() {
        $('button').click(function(e) {
            var b = $(this)
            bootbox.confirm("Вы уверены?", function(result) {
                if(result == true) b.parent().submit();
            });
        });
        $('a.delete').click(function(e) {
            e.preventDefault();
            var b = $(this)
            bootbox.confirm("Вы уверены?", function(result) {
                if(result == true) window.location = b.attr('href');
            });
        });
    });
</script>
</body>
</html>