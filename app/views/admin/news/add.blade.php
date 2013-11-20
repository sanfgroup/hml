@extends('admin.layouts.default')

@section('content')
<script>
    $(document).ready(function(){
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
    });
</script>
{{ Form::open() }}
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" name="title" class="form-control" placeholder="Название новости" @if(isset($post->title)) value="{{$post->title}}" @endif>
        <label for="text">Новость</label>
        <textarea name="text" id="textareas" cols="30" rows="10" class="form-control" placeholder="Текст новости">@if(isset($post->content)) {{$post->content}} @endif</textarea>
        <input type="submit" class="btn btn-primary" value="Добавить"/>
    </div>
{{ Form::close() }}

@stop