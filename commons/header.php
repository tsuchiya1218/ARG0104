<div><img src="" alt="ARAGIN弁当" srcset=""></div>
<ul>
  <li><a href="/company/company.html">会社概要</a></li>
  <li><a href="../index.php">メニュー</a></li>
  <li><a href="/order/order.php">注文</a></li>
  <li><a href="/contact/contact.html">お問い合わせはこちらから</a></li>
  <?php
  if (false) { //TODO:ログインしているか判定
    print '<li><a href="/userEntry/userMenu.php">会員メニュー</a></li>';
  } else {
    print '<li><a href="../account/login.php">ログイン</a></li>
            <li><a href="../userEntry/userRegister.php">新規会員登録</a></li>';
  }
  ?>
</ul>
