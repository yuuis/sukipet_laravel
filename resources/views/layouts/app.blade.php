<html>
    <head>
        <title>SUKIPET - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
        @show
        <a href="/">[ホーム]</a>
        @if(hasLogin())
            <a href="questions/create">[質問投稿]</a>
            <a href="logout">[ログアウト]</a>
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
    </body>
</html>