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
        <h2>ログイン</h2>

        <table>
          <form action="" method="post">

          <tr>
              <th><label for="exampleInputEmail1" class="form-label">メールアドレス：</label></th>
              <td><input type="text" name="form[email]" value="" placeholder="メールアドレスを入力して下さい。"></td>
          </tr>
          <tr>
            <th><label for="exampleInputPassword1" class="form-label">パスワード(半角英数字6~8文字):</label></th>
            <td><input  type="password" name="form[password]" value="" placeholder="パスワードを入力して下さい。"></td>
          </tr>
          <tr>
          <td><input type="hidden" name="mode" value="login">
          <input type="submit" name="login" value="ログイン"></td>
          </tr>
          </form>
        </table>

    </main>
    <footer>
      <?php include("../commons/footer.php") ?>
    </footer>

</body>

</html>
