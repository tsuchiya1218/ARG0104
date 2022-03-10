<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../commons/head.php") ?>
  <title>ARAGIN弁当 カスタムページ</title>
</head>
<?php

try {
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
  $dbh = new PDO($dsn, $user, $password);
  $products = array();
  $sumcal = 0;
  if (isset($_POST["main"]) && isset($_POST["sub"]) && isset($_POST["rice"]) && count($_POST["sub"]) == 2) {
    $products = array($_POST["main"], $_POST["sub"][0], $_POST["sub"][1], $_POST["rice"]);

    $stmt = $dbh->prepare("SELECT * FROM product where productId in( " . implode(',', array_fill(0, count($products), '?')) . ")");
    for ($i = 0; $i < count($products); $i++) {
      $stmt->bindParam($i + 1, $products[$i]);
    }
    $stmt->execute();
?>

    <body>
      <div class="wrap">
        <?php include("../commons/header.php") ?>
        <main>
          <form action="../order/cart.php" method="post">
            <table>
              <tr>
                <th>選択した主菜</th>
                <?php $r = $stmt->fetch();
                $sumcal = $sumcal + substr($r['calorie'], 0, strpos($r["calorie"], "kcal"));
                ?>
                <td><img src=<?= '"../index/img/' . $r['productId'] . '.jpg"' ?> style="width:1em;height:1em;"></td>
                <td><?= $r['productName'] ?></td>

                <td><?= $r['calorie'] ?></td>
              </tr>
              <input type="text" name="c0000[0]['main']" value=<?= '"' . $r['productId'] . '"' ?> hidden>
              <tr>
                <th>選択した副菜1</th>
                <?php $r = $stmt->fetch();
                $sumcal = $sumcal + substr($r['calorie'], 0, strpos($r["calorie"], "kcal"));
                ?>
                <td><img src=<?= '"../index/img/' . $r['productId'] . '.jpg"' ?> style="width:1em;height:1em;"></td>
                <td><?= $r['productName'] ?></td>

                <td><?= $r['calorie'] ?></td>
              </tr>
              <input type="text" name="c0000[0]['sub']" value=<?= '"' . $r['productId'] . '"' ?> hidden>
              <tr>
                <th>選択した副菜2</th>
                <?php $r = $stmt->fetch();
                $sumcal = $sumcal + substr($r['calorie'], 0, strpos($r["calorie"], "kcal"));
                ?>
                <td><img src=<?= '"../index/img/' . $r['productId'] . '.jpg"' ?> style="width:1em;height:1em;"></td>
                <td><?= $r['productName'] ?></td>

                <td><?= $r['calorie'] ?></td>
              </tr>
              <input type="text" name="c0000[0]['sub']" value=<?= '"' . $r['productId'] . '"' ?> hidden>
              <tr>
                <th>選択したご飯</th>
                <?php $r = $stmt->fetch();
                $sumcal = $sumcal + substr($r['calorie'], 0, strpos($r["calorie"], "kcal"));
                ?>
                <td><img src=<?= '"../index/img/' . $r['productId'] . '.jpg"' ?> style="width:1em;height:1em;"></td>
                <td><?= $r['productName'] ?></td>

                <td><?= $r['calorie'] ?></td>
              </tr>
              <input type="text" name="c0000[0]['rice']" value=<?= '"' . $r['productId'] . '"' ?> hidden>
              <tr>
                <th>金額</th>
                <td>500円</td>
              </tr>
              <tr>
                <th style="font-size: smaller;">合計カロリー</th>
                <td><?= $sumcal ?>kcal</td>
              </tr>
            </table>
            <button type="submit">カートに追加</buttom>
          </form>
      <?php } else {
      echo "エラー";
    }
  } catch (PDOException $e) {
    echo 'DB接続失敗';
  } ?>
        </main>
        <?php include("../commons/footer.php") ?>
      </div>
    </body>

</html>
