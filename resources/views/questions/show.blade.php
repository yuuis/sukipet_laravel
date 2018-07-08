@extends('layouts.app')
@section('content')

<h1>{{ $return["question"]->title }}</h1>

本文: {{ $return["question"]->body }}<br>
カテゴリ: {{ $return["category"]->name }}<br>
{{ $return["user"]->name }}さん<br>

@if(hasLogin())
  <a href="#">回答する</a><br>
@endif

  @foreach($return["answers"] as $answer)
    回答:
    <div style="border-style: solid ; border-width: 1px;">
      @foreach($return["messages"] as $message)
        <% if message.answer_id == answer.id %>
        @if($message->answer_id === $answer->id)
          {{ $message->body }}
          {{ $return["users"][$message->id]->name }}さん<br>
          {{ $message->create_at }}
        @endif
      @endforeach
    </div>
    @if(hasLogin())
      <a href="#">この回答にコメントする</a><br>
    @endif
  @endforeach

@endsection