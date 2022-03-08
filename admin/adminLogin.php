<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("./commons/adminHead.php") ?>
  <title>ARAGIN弁当　管理者ログインぺージ</title>
</head>

<body>

  <header>
    <?php include("./commons/adminHeader.php") ?>
  </header>
  <main>
    <div class="container py-4" id="contact">
      <h2>ARAGIN弁当管理者ログインページ</h2>

      <table>
        <form action="../account/auth.php" method="post">

          <tr>
            <th><label for="Email" class="form-label">メールアドレス：</label></th>
            <td><input type="text" class="form-control" name="user" value="" placeholder="example@xxx.xxx" required></td>
          </tr>
          <tr>
            <th><label for="Password" class="form-label">パスワード:</label></th>
            <td><input class="form-control" type="password" name="password" value="" placeholder="半角英数字6~8文字" required></td>
          </tr>
          <tr>
            <td></td>
            <td class="d-flex
justify-content-end"><input type="submit" class="clickbtn    btn" name="login" value="ログイン"></td>
          </tr>
        </form>
      </table>
  </main>
  <footer>
    <?php include("./commons/adminFooter.php") ?>
  </footer>
  </div>
</body>

</html>
