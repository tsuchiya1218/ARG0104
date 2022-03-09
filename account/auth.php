 <?php


      // if (isset($_POST['mail'])) {
      //   session_start();
      //   $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
      //   $user = '20jy0115';
      //   $password = '20jy0115';
      //   $dbh = new PDO($dsn, $user, $password);

      //   $stmt = $dbh->prepare("SELECT * FROM member WHERE mail=:mail");
      //   $stmt->bindParam(':mail', $_POST['mail']);
      //   $stmt->execute();
      //   if ($rows = $stmt->fetch()) {
      //     if ($rows["pass"] ==  $_POST['pass']) {
      //       $_SESSION['account'] = $rows['memberNAME'];

      //       $name = $_SESSION['account'];
      //       $name = $_SESSION['account'];


      //       header('Location:../index/index.php');
      //     } else {

      //       print "<p>ログイン失敗</p>";
      //       session_destroy();
      //     }
      //   } else {
      //     session_destroy();
      //     print "<p>ログイン失敗</p>";
      //   }
      // }

      ?>

<?php
// セッションにアカウント情報がある場合
if (isset($_SESSION['account'])) {
  // 認証処理
  $account = authCheck($_SESSION['account']['mail'], $_SESSION['account']['pass']);
  if (isset($account)) {
    // ログインフラグをtrueにする
    $login = true;
    // セッションにユーザー情報を格納
    $_SESSION['account'] = $account;
  } else {
    // ログインフラグをfalseにする
    $login = false;
    // セッションを破棄
    unset($_SESSION['account']);
  }
  // セッションにアカウント情報がない場合
} else {
  // ログインフラグをfalseにする
  $login = false;
}
?>
