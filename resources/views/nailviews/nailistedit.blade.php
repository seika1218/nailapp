<!-- ネイリスト編集画面 -->
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
        @foreach($nailists as $key => $value)
        <form method="post" action="/nailisteditcomplete/{{$value->id}}" name="form">
            @csrf
            <div class="stuff">

                <p class="nailistedit-p">お名前</p>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="textBox">
                    <input class="text" type="textbox" name="name" value="{{$value->name}}">
                    <label class="error"></label>
                </div>

                <p class="nailistedit-p">メールアドレス</p>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="textBox">
                    <input class="text" type="textbox" name="email" value="{{$value->email}}">
                    <label class="error"></label>
                </div>

                <input type="submit" class="login-button" name="button" value="更新">
            </div>
        </form>
        @endforeach
        <form method="get" action="/nailistdelete" class="deleteform">
            <button type="submit" class="login-button">退会</button>
        </form>


        <div class="forget-password"><a href="{{ url('/nailistdashboard') }}">戻る</a></div>
    </main>

    <footer>
        @include('nailviews/inc.footer')
    </footer>
</body>

</html>