<!-- トップ画面（会員） -->

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

<body>

    <header>
        @include('nailviews/inc.headerlogout')
    </header>

    <main>

        <img class="topimage" src="img/topimage.jpg">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">



<form action="" class="search_container">
  <input type="text" size="25" placeholder="キーワード検索">
  <input type="submit" value="&#xf002">
</form>
<br>
<div class="btn-info">
<a href="{{ url('/good') }}" class="button-3">いいね一覧</a>
<a href="{{ url('/mybooking') }}" class="button-3">予約一覧</a>
<a href="{{ url('/mypage') }}" class="button-3">マイページ</a>
</div>
    </main>

    <div class="example">
        <img src="img/topimage.jpg">
        <img src="img/topimage.jpg">
        <img src="img/topimage.jpg">
        <br>
        <img src="img/topimage.jpg">
        <img src="img/topimage.jpg">
        <img src="img/topimage.jpg">
    </div>

    <footer>
    @include('nailviews/inc.footer')
    </footer>
</body>

</html>