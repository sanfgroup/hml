@extends('site.layouts.default')

@section('content')
<h2>Оставить отзыв</h2>
{{ Form::open() }}
<div class="add_review">
    <textarea name="add_review" id="add_review" ></textarea>
    <div class="foot_r">
        <input type="submit" class="btn btn-primary" value="Оставить отзыв" />
    </div>
</div>
<div class="clear"></div>
{{Form::close()}}
@stop