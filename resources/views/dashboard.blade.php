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
    <script src="https://kit.fontawesome.com/c19f37287d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/like.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>

<body>

    <header>
        @include('nailviews/inc.headerlogout')
    </header>

    <main>
        <img class="topimage" src="img/topimage.jpg">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <form method="get" action="/result" class="search_container">
            <input type="search" class="form-control mr-sm-2" name="search" value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
            <input type="submit" value="&#xf002">
        </form>


        <br>
        <div class="btn-info">
            <a href="{{ url('/good') }}" class="button-3">いいね一覧</a>
            
            <a href="{{ url('/mypage') }}" class="button-3">マイページ</a>
        </div>
  

<div class="mar">
    @foreach($nails as $key => $value)

    <a href="{{ route('naildetail',$value->id) }}"><img class="naildash" src="{{ asset($value->img_path) }}"></a>


   <!-- 参考：$itemにはNailControllerから渡した投稿のレコード$itemsをforeachで展開してます -->
  
    <!-- Nail.phpに作ったisLikedByメソッドをここで使用 -->
    @if (!$nail->isLikedBy(Auth::user()))

    <span class="likes">

        <i class="fa-solid fa-heart like-toggle" data-nail-id="{{ $value->id }}"></i>
        <span class="like-counter">{{$value->likes_count}}</span>
    </span><!-- /.likes -->
    @else
    <span class="likes">
        <i class="fa-solid fa-heart like-toggle liked" data-nail-id="{{ $value->id }}"></i>
        <span class="like-counter">{{$value->likes_count}}</span>
    </span><!-- /.likes -->
    @endif



    @endforeach
    </div>
    </main>
    <footer>
        @include('nailviews/inc.footer')
    </footer>
</body>

</html>