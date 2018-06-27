@extends('layouts.app')
@section('content')

<h1>アカウント作成</h1>
  
<form action="/users" method="post">
    {{ csrf_field() }}
    <div class="field">
        <label>name</label>
        <input type="text" name="name" value="{{old('name')}}">
        @if($errors->has("name"))
            @foreach($errors->get("name") as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        @endif
    </div>
    <div class="field">
        <label>email</label>
        <input type="email" name="email" value="{{old('email')}}">
        @if($errors->has("email"))
            @foreach($errors->get("email") as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        @endif
    </div>
    <div class="field">
        <label>password</label>
        <input type="password" name="password" value="">
        @if($errors->has("password"))
            @foreach($errors->get("password") as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        @endif
    </div>

    <input type="submit" name="アカウント作成">
</form>

@endsection