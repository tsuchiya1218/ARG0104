<!DOCTYPE html>
<html lang="ja">
<?php include("../commons/head.php") ?>
<title>ARAGIN弁当　トップページ</title>

<body>
  <?php include("../commons/header.php") ?>
  <main>
    <h1 class="tile">ARAGIN弁当　トップページ</h1>
    <h2></h2>
    <?php
    session_start();
    if (isset($_SESSION['account'])) {
      try {
        $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
        $user = '20jy0115';
        $password = '20jy0115';
        $dbh = new PDO($dsn, $user, $password);
        $stmt = $dbh->prepare("SELECT * FROM product");
        $stmt->execute();
        // echo'db接続成功';
      } catch (PDOException $e) {
        echo 'DB接続失敗';
      }
    }
    ?>
    <table>
      <tr>
        <td>
          <p></p><img src="./img/blackpaper.jpeg">
        </td>
      </tr>
    </table>
  </main>
  <?php include("../commons/footer.php") ?>

</body>

</html>
