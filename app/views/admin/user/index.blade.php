@extends('admin.layouts.default')

@section('content')
<table>
    <tr>
        <td>id</td>
        <td>login</td>
        <td>email</td>
        <td>referral</td>
        <td>balance</td>
        <td>action</td>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->referral()->first()->username}}</td>
        <td>{{$user->id}}</td>
        <td>{{$user->id}}</td>
    </tr>
    @endforeach
</table>
<section>
    <h2><a href="{{URL::route('admin.new.detail', array($post->id))}}">{{$post->title}}</a></h2>
    <a href="{{URL::route('admin.news.delete', array($post->id))}}">Удалить</a> | <a href="{{URL::route('admin.addNews', array($post->id))}}">Редактировать</a>
    <div>
        {{$post->short}}
    </div>
</section>
{{$posts->links()}}
@stop