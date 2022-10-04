<!-- ネイル編集画面 -->
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
    @include('nailviews/inc.header')
</header>

<body>
    <main class="">
        <form method="post" action="/naileditcomplete/{{$nailedit->id}}" name="form">
            @csrf
            <img class="naildash imgedit" src="{{ asset($nailedit->img_path) }}">
            <br>
            <textarea rows="10" cols="60" name="explanation" class="con-btn-large textedit">{{ $nailedit->explanation }}</textarea>
            <br>
            <input type="submit" class="con-enter btnedit" name="button" value="更新">
        </form>

        <div class="forget-password"><a href="{{ url()->previous() }}">戻る</a></div>
    </main>
    <footer>
        @include('nailviews/inc.footer')
    </footer>
</body>

</html>