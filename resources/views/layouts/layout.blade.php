<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  @yield('styles')
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand" href="/">ToDo App</a>
      <div class="my-navbar-control">
        @if(Auth::check())
        <span class="my-navbar-item">{{Auth::user()->name}}さん</span>
        <a href="" class="my-navbar-item" id="logout">ログアウト</a>
        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
          @csrf
        </form>
        @else
        <a href="{{route('login')}}" class="my-nav-bar-item">ログイン</a>
        ★
        <a href="{{route('register')}}" class="my-navbar-item">新規登録</a>
        @endif
      </div>
    </nav>
  </header>
  <main>
    @yield('content')
  </main>

  @if(Auth::check())
  <script>
  document.getElementById('logout').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('logout-form').submit();
  });
  </script>
  @endif

  @yield('scripts')
</body>

</html>