<!-- いいね一覧画面 -->
<!DOCTYPE html>
<meta charset="utf-8">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>naildesignbook</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/c19f37287d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/like.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<header>
        @include('nailviews/inc.header')
    </header>
<body>
<main class="resultmain">

    <div class="label">
    <div class="goodlabel">いいね一覧</div>
    </div>
    <br>
    @foreach($nail as $key => $value)

    <a href="{{ route('naildetail',$value->id) }}"><img class="naildash goodimg" src="{{ asset($value->img_path) }}"></a>
   
    @endforeach
    <div class="forget-password"><a href="{{ url('/dashboard') }}">戻る</a></div>

    </main>
    <footer>
        @include('nailviews/inc.footer')
    </footer>
</body>

</html>