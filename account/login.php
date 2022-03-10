<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../commons/head.php") ?>
  <title>ARAGIN弁当　ログインぺージ</title>
</head>

<body>
  <header>
    <?php include("../commons/header.php") ?>
  </header>
  <main>
    <div class="container py-4" id="contact">
      <h2>ユーザーログイン</h2>

      <table>
        <?php

        $errorMessage = ""; // エラーメッセージ初期化
        // ログイン処理

        if (!empty($_POST['mail']) && !empty($_POST['pass'])) {
          if ($account = login($_POST['mail'], $_POST['pass'])) {
            $_SESSION['account'] = $account;
            $_SESSION['memberId'] = $account['id'];
            echo $name;
            header('Location:../index/index.php');
            // ログイン失敗時の表示
          } else {
            $errorMessage = "ログインに失敗しました。";
            ?> <h3 class="error"><?= $errorMessage ?></h3>
            <?php
            session_destroy();
          }
        } else {
          $errorMessage = "メールアドレスとパスワードを入力してください。";

          session_destroy();
        }
        ?>
        <form action="" method="post">

          <tr>
            <th><label for="mail" class="form-label">メールアドレス：</label></th>
            <td><input type="text" name="mail" class="form-control" value="" placeholder="メールアドレスを入力して下さい。"></td>
          </tr>
          <tr>
            <th><label for="password" class="form-label">パスワード(半角英数字6~8文字):</label></th>
            <td><input type="password" name="pass" class="form-control" value="" placeholder="パスワードを入力して下さい。"></td>
          </tr>
          <tr>
            <td><input type="hidden" name="mode" value="login">
            </td>
            <td><input type="submit" class="loginbtn btn" name="login" value="ログイン"></td>

          </tr>
        </form>
      </table>

  </main>
  </div>
  <footer>
    <?php include("../commons/footer.php") ?>
  </footer>
</body>

</html>
