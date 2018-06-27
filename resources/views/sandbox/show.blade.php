@extends('layouts.app')
@section('content')

<h1>トップページ</h1>
<ul>
    @foreach($questions as $question)
        <li>{{$question->title}}</li>
    @endforeach
</ul>

@endsection