<!-- トップ画面（非会員） -->

<!DOCTYPE html>
<meta charset="utf-8">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>naildesignbook</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" />
    <script src="https://kit.fontawesome.com/c19f37287d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <header>
        @include('nailviews/inc.header')
    </header>

    <main>

        <img class="topimage" src="img/topimage.jpg">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="topdiv">会員登録するとお気に入りのデザインをいいねして<br>いつでも見返すことができます。</div>
   
    <div class="mar">
        <div class="topp">投稿一覧</div>
    @foreach($nails as $key => $value)

<img class="naildash" src="{{ asset($value->img_path) }}">

@endforeach
</div>
</main>
    <footer>
    @include('nailviews/inc.footer')
    </footer>
</body>

</html>