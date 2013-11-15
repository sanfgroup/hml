<script>
    $(function() {
        new TINY.editor.edit('editor',{
            id:'textareas', // (required) ID of the textarea
            width:584, // (optional) width of the editor
            height:175, // (optional) heightof the editor
            cssclass:'te', // (optional) CSS class of the editor
            controlclass:'tecontrol', // (optional) CSS class of the buttons
            rowclass:'teheader', // (optional) CSS class of the button rows
            dividerclass:'tedivider', // (optional) CSS class of the button diviers
            controls:['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|', 'orderedlist', 'unorderedlist', '|' ,'outdent' ,'indent', '|', 'leftalign', 'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n', 'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'], // (required) options you want available, a '|' represents a divider and an 'n' represents a new row
            footer:true, // (optional) show the footer
            fonts:['Verdana','Arial','Georgia','Trebuchet MS'],  // (optional) array of fonts to display
            xhtml:true, // (optional) generate XHTML vs HTML
            cssfile:'/css/editor.css', // (optional) attach an external CSS file to the editor
            css:'body{background-color:#ccc}', // (optional) attach CSS to the editor
            bodyid:'editor', // (optional) attach an ID to the editor body
            footerclass:'tefooter', // (optional) CSS class of the footer
            toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'}, // (optional) toggle to markup view options
            resize:{cssclass:'resize'} // (optional) display options for the editor resize
        });

        $('form button, form input[type=submit].pay, form input[type=submit].delete, form input[type=submit].payed').click(function(e) {
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