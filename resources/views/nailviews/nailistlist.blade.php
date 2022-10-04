<!-- ネイリスト投稿一覧 -->
<?php
session_start();  ?>
<!DOCTYPE html>
<meta charset="utf-8">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>naildesignbook</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<header>
  @include('nailviews/inc.headerlogout')
</header>

<body>
  <main class="listmain">
    @foreach($nails as $key => $value)
    <img class="naildash" src="{{ asset($value->img_path) }}">
    <form action="/nailedit/{{$value->id}}" method="POST">
      @csrf
      <button type="submit" class="btn">編集</button>
    </form>
    <form action="/naildestroy/{{$value->id}}" method="POST">
      @csrf
      <button type="submit" class="btn">削除</button>
    </form>
    @endforeach


    <div class="forget-password"><a href="{{ url('/nailistdashboard') }}">戻る</a></div>
  </main>
  <footer>
    @include('nailviews/inc.footer')
  </footer>
</body>

</html>