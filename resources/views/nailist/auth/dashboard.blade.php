<!-- ネイリスト画面 -->
<?php
session_start();
?>
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
        <div class="btn-info nailistmargin">
            <a href="/nailup/" class="button-3">ネイル新規登録</a>
            <a href="{{ url('/nailistlist') }}" class="button-3">投稿一覧</a>
            <a href="{{ url('/nailistedit') }}" class="button-3">マイページ</a>
        </div>
    </main>
    <footer>
        @include('nailviews/inc.footer')
    </footer>
</body>

</html>