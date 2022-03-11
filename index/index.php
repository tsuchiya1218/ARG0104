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
        <h2 id="menu">メニュー</h2>
      </div>
      <?php
      try {
        $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
        $user = '20jy0115';
        $password = '20jy0115';
        $dbh = new PDO($dsn, $user, $password);
        $stmt = $dbh->prepare("SELECT * FROM product WHERE productId NOT LIKE 'c0000' order by productId desc");

        $stmt->execute();
      } catch (PDOException $e) {
        echo $stmt;
        echo 'DB接続失敗';
      }
      if (isset($_SESSION['account'])) { ?>
        <div style="text-align:right;"><a class="h3" href="../custom/custom.php">カスタム弁当はこちら</a></div>
      <?php } ?>

      <form action="../order/cart.php" method="post">

        <table border="1">

          <?php
          while ($row = $stmt->fetch()) {
            $result['id'] = $row['productId'];
            $result['name'] = $row['productName'];
            $result['price'] = $row['price'];
            $result['calorie'] = $row['calorie'];
            $result['evaluation'] = $row['evaluation'];
            $allergysql = $dbh->prepare("SELECT DISTINCT allergyName FROM productAllergy INNER JOIN  allergy ON productAllergy.allergyId = allergy.allergyId   WHERE productId = :productId");
            $allergysql->bindParam(":productId", $result['id']);
            $allergysql->execute();
            $r = $allergysql->fetchAll();
            $result['allergy'] = $r;
          ?>


            <tr>
              <th style="width: 20%;"><?= $result['name'] ?></th>
              <td style="width:10%">
                <img class="menuimg" src=<?= "img/" . $result['id'] . ".jpg" ?>>
              </td>
              <td style="width:5%"><?= $result['price'] . "円" ?></td>
              <td><?= $result['calorie'] ?></td>
              <td><?= 'オススメ度:' . $result['evaluation'] ?></td>
              <td><?='アレルゲン:'?> <?php  $str = "";
                            foreach ($result['allergy'] as $key => $value) {
                              $str = $str . $value[0] . " ";
                            }
                            echo $str == "" ? "なし" : $str;
                            ?></td>
              <?php
              if (isset($_SESSION['account'])) {
              ?>
                <td><input type="number" style="width:3.5em;" value="0" min="0" name=<?= '"' . $result["id"] . '"' ?>></td>

              <?php
              }
              ?>
            </tr>
          <?php }
          if (isset($_SESSION['account'])) {
          ?>
            <button type="submit" class="btn btn-pink rounded" style="position: fixed;bottom:10%;right:10%;display:float;z-index:999">カートに入れる</button>
          <?php } ?>
        </table>

      </form>
    </div>
  </main>
  <?php include("../commons/footer.php") ?>

</body>

</html>
