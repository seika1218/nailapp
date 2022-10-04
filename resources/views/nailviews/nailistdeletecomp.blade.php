<!-- ネイル編集完了画面 -->
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
<main>

<div class="nailmesse">退会しました。</div>
<div class="forget-password"><a href="{{ url('/top') }}">トップへ</a></div>
    </main>
    <footer>
        @include('nailviews/inc.footer')
    </footer>
</body>

</html>