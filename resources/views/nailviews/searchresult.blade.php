<!-- マイページ編集完了画面 -->
<!DOCTYPE html>
<meta charset="utf-8">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>naildesignbook</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Bootstrap本体 -->
    <script src="https://kit.fontawesome.com/c19f37287d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/like.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<header>
        @include('nailviews/inc.headerlogout')
    </header>
<body>
<main>
    <div class="result">検索結果</div>
<br>

@foreach($articles as $key => $value)
    <a href="{{ url('/nailedit') }}"><img class="naildash" src="{{ asset($value->img_path) }}"></a>

    @if (!$nail->isLikedBy(Auth::user()))

<span class="likes">

    <i class="fa-solid fa-heart like-toggle liked" data-nail-id="{{ $value->id }}"></i>
    <span class="like-counter">{{$value->likes_count}}</span>
</span><!-- /.likes -->
@else
<span class="likes">
    <i class="fa-solid fa-heart like-toggle" data-nail-id="{{ $value->id }}"></i>
    <span class="like-counter">{{$value->likes_count}}</span>
</span><!-- /.likes -->
@endif






    @endforeach
<div class="links d-flex justify-content-center ">
        {{ $articles->links() }}
  </div>


        <div class="forget-password"><a href="{{ url('/dashboard') }}">戻る</a></div>
    </main>
    <footer>
        @include('nailviews/inc.footer')
    </footer>
</body>

</html>