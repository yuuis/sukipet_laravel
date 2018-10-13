<html>
    <head>
        <title>SUKIPET - @yield('title')</title>
        <meta name="csrf-token" href="{{mix('/css/app.css')}}">
    </head>
    <body>
        @section('sidebar')
        @show
        <a href="/">[ホーム]</a>
        @if(hasLogin())
            <a href="questions/create">[質問投稿]</a>
            <a href="/logout">[ログアウト]</a>
            {{currentUser()->name}}でログイン中
        @else
            <a href="/users/create">[ユーザ登録]</a>
            <a href="/login">[ログイン]</a>
        @endif
        <hr>
        @if(isset($notice))
          <p style="color: green;">{{$notice}}</p>
        @endif
        @if(isset($alert))
          <p style="color: red;">{{$alert}}</p>
        @endif
        <div class="container">
            @yield('content')
        </div>
        <div id="app">
            <example-component></example-component>
        </div>
        <script src="{{mix('/js/app.js')}}"></script>
    </body>
</html>