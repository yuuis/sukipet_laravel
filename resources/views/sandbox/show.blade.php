@extends('layouts.app')
@section('content')

<h1>トップページ</h1>
<div id="app"></div>
<ul>
    @foreach($questions as $question)
        <li><a href="questions/{{$question->id}}">{{$question->title}}</a></li>
    @endforeach
</ul>

@endsection