<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../commons/head.php") ?>
  <title>ARAGIN弁当　トップページ</title>
</head>

<body>
  <header>
    <?php include("../commons/header.php") ?>
  </header>
  <main>
    <div class="container py-4" id="contact">
      <h1 class="tile">ARAGIN弁当　トップページ</h1>
      <br>
      <br>
      <br>

      <div class="margin">
        <h2>メニュー</h2>
      </div>
      <?php
      try {
        $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
        $user = '20jy0115';
        $password = '20jy0115';
        $dbh = new PDO($dsn, $user, $password);
        $stmt = $dbh->prepare("SELECT * FROM product");
        $stmt->execute();
        echo 'db接続成功';
      } catch (PDOException $e) {
        echo 'DB接続失敗';
      }
      ?>
      <table>
        <?php
        while ($row = $stmt->fetch()) {
          $result['id'] = $row['productId'];
          $result['name'] = $row['productName'];
          $result['price'] = $row['price'];
          $result['calorie'] = $row['calorie'];
          $result['evaluation'] = $row['evaluation'];
        ?>

          <tr>
            <th><?= $result['name'] ?></th>
            <td style="width:25%">
              <img class="menuimg" src=<?= "img/" . $result['id'] . ".jpg" ?>>
            </td>
            <td style="width:25%"><?= $result['price'] . "円" ?></td>
            <td style="width:25%"><?= $result['calorie'] ?></td>
            <td><?= $result['evaluation'] ?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </main>
  <?php include("../commons/footer.php") ?>

</body>

</html>
