<!-- ネイル登録画面 -->
<?php session_start(); ?>
<!DOCTYPE html>
<meta charset="utf-8">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>naildesignbook</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" />
  <script src="{{ asset('/js/nail.js') }}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
  <header>
    @include('nailviews/inc.headerlogout')
  </header>

  <main>
    <form action="{{url('/nailcomp')}}" method="post" enctype="multipart/form-data">
      @csrf

      <div>
        <input type="file" id="img_path" name="ma" required>
        <div id="preview"></div>
      </div>

      <textarea rows="10" cols="60" name="explan" class="explan" value="" required></textarea>

      <div>
        <input type="hidden" id="example" name="nailist_id" value="<?php

                                                                  use Illuminate\Support\Facades\Auth;

                                                                  echo Auth::user()->id;
                                                                  ?>">
      </div>

      <div>
        <input type="submit" id="per" value="投稿する">
      </div>
    </form>

  </main>
  <footer>
    @include('nailviews/inc.footer')
  </footer>
  <div id="preview"></div>
  <script src="{{ asset('/js/nail.js') }}"></script>
</body>

</html>