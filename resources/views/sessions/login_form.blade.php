@extends('layouts.app')
@section('content')

<h1>ログイン</h1>
<form action="/login" method="post">
  {{csrf_field()}}
  <div class="field">
      <label>email</label>
      <input type="text" name="email"value="">
  </div>
  <div class="field">
      <label>password</label>
      <input type="password" name="password"value="">
  </div>
  <input type="submit" value="ログイン">
</form>
@endsection