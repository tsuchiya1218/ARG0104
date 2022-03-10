<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../../admin/commons/adminHead.php") ?>
  <title>ARAGIN弁当　管理者ログインぺージ</title>
</head>

<body>
  <header>
    <?php include("../../admin/commons/adminHeader.php") ?>
  </header>
  <main>
    <div class="container py-4" id="contact">
      <h2>ARAGIN弁当管理者ログインページ</h2>
      <table>
        <?php

        $errorMessage = ""; // エラーメッセージ初期化
        // ログイン処理
        if (!empty($_POST['adminmail']) && !empty($_POST['adminpass'])) {
          if ($account = adminLogin($_POST['adminmail'], $_POST['adminpass'])) {
            $_SESSION['account'] = $account;
            echo $name;
            header('Location:adminMenuorder.php');
            // ログイン失敗時の表示
          } else {
            $errorMessage = "ログインに失敗しました。";
            echo $errorMessage;
            session_destroy();
          }
        } else {
          $errorMessage = "メールアドレスとパスワードを入力してください。";

          session_destroy();
        }
        ?>
        <form action="" method="post">

          <tr>
            <th><label for="adminmail" class="form-label">メールアドレス：</label></th>
            <td><input type="text" name="adminmail" class="form-control" value="" placeholder="メールアドレスを入力して下さい。"></td>
          </tr>
          <tr>
            <th><label for="adminpassword" class="form-label">パスワード(半角英数字6~8文字):</label></th>
            <td><input type="password" name="adminpass" class="form-control" value="" placeholder="パスワードを入力して下さい。"></td>
          </tr>
          <tr>
            <td><input type="hidden" name="mode" value="login">
              <input type="submit" name="adminlogin" value="ログイン">
            </td>
          </tr>
        </form>
      </table>
  </main>
  <footer>
    <?php include("../../admin/commons/adminFooter.php") ?>
  </footer>
  </div>
</body>

</html>
