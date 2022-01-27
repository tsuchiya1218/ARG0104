<header>
    <div><img src="" alt="ARAGIN弁当" srcset=""></div>
    <ul>
        <li><a href="/menu/menu.php">メニュー</a></li>
        <li><a href="/order/order.php">注文</a></li>
        <?php 
        if (false) { //TODO:ログインしているか判定
            print '<li><a href="/userEntry/userMenu.php">会員メニュー</a></li>';
        }else{
            print '<li><a href="../login/login.php">ログイン</a></li>
            <li><a href="../userEntry/userRegister.php">新規会員登録</a></li>';
        }
        ?>
    </ul>
</header>