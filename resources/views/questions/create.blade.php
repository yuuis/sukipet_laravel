@extends('layouts.app')
@section('content')
<h1>質問投稿</h1>

<form action="/questions" method="post">
    {{ csrf_field() }}
    <div class="field">
        <label>タイトル</label>
        <input type="text" name="title" value="{{old('title')}}">
        @if($errors->has("title"))
            @foreach($errors->get("title") as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        @endif
    </div>
    <div class="field">
        <label>本文</label>
        <textarea name="body" rows="4" cols="40">{{old('body')}}</textarea>
        @if($errors->has("body"))
            @foreach($errors->get("body") as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        @endif
    </div>
    <div class="field">
        <label>カテゴリ</label>
        <select name="category">
            @foreach($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="質問する">
</form>
@endsection