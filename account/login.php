<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../commons/head.php") ?>
  <title>ARAGIN弁当　ログインぺージ</title>
</head>

<body>
  <div class="wrap">
    <header>
    <?php include("../commons/header.php") ?>
    </header>
    <main>
      <?php
      session_start();
      require_once('../account/dbaccess.php'); // データベースアクセスファイル読み込み
      require_once('../account/auth.php'); // ログイン認証ファイル読み込み
      $errorMessage = ""; // エラーメッセージ初期化
      // ログイン処理
      if ($_POST['mode'] == "login") {
        if (!empty($_POST['form']['email']) && !empty($_POST['form']['password'])) {
          if ($account = login($_POST['form']['email'], $_POST['form']['password'])) {
            $_SESSION['account'] = $account;
            header("Location: ./login.php");
            // ログイン失敗時の表示
          } else {
            $errorMessage = "ログインに失敗しました。";
          }
        } else {
          $errorMessage = "メールアドレスとパスワードを入力してください。";
        }
      }
      ?>
      <?php if ($login) { ?>
        echo "ログインしました。";
      <?php } else { ?>
        <h2>ログイン</h2>
        <?php echo $errorMessage; ?>
        <form action="" method="post">
        <input type="text" name="form[email]" value="" placeholder="メールアドレスを入力して下さい。"><br>
        <input type="password" name="form[password]" value="" placeholder="パスワードを入力して下さい。">
        <input type="hidden" name="mode" value="login">
        <input type="submit" name="login" value="ログイン">
      </form>
      <?php } ?>
    </main>
    <footer>
      <?php include("../commons/footer.php") ?>
    </footer>
  </div>
</body>

</html>
