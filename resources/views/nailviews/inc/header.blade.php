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
            <ul>
                <li>
                    <a href="{{ url('/memberregister') }}">会員登録</a>
                </li>
                <li>
                    <a href="{{ url('/memberlogin') }}">ログイン</a>
                </li>
                <li>
                    <a href="{{ url('/nailistregister') }}">ネイリスト登録</a>
                </li>
                <li>
                    <a href="{{ url('/nailistlogin') }}">ネイリストログイン</a>
                </li>
            </ul>
        </div>
        <!--ここまでメニュー-->
    </div>
</header>
