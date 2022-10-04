<header>
    <div class="header">
        <img class="header-logo" src="<?php echo asset('img/naillogo1.png') ?>">
        <p class="header-p">nail design book</p>
    </div>
    <div class="hamburger-menu">
        <input type="checkbox" id="menu-btn-check">
        <label for="menu-btn-check" class="menu-btn"><span></span></label>
        <!--ここからメニュー-->
        <div class="menu-content">
            <form action="{{url('/top')}}" method="post">
                @csrf
                <input type="submit" class="logoutbtn" value="ログアウト">
            </form>
        </div>
        <!--ここまでメニュー-->
    </div>
</header>