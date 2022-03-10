<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../commons/head.php") ?>
  <title>ARAGIN弁当 カスタムページ</title>
</head>

<body>
  <?php include("../commons/header.php") ?>
  <main>
    <h1>カスタム弁当作成</h1>
    <p>カスタム弁当は1つ500円です</p>
    <form method="post" action="conCustom.php" onsubmit="return checkSideDish()" style="display:flex;flex-direction:column;align-items:center;margin-bottom:1vh;">
      <?php

      try {
        $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
        $user = '20jy0115';
        $password = '20jy0115';
        $dbh = new PDO($dsn, $user, $password);
        $stmt = $dbh->prepare("SELECT * FROM product where productId like 'm%'");
        $stmt->execute();
      ?>
        <p id="menu">主菜を1つ選んでください</p>
        <div style="display:flex;flex-direction:row;flex-wrap:wrap;width:50%">
          <?php
          while ($r =  $stmt->fetch()) {
          ?>
            <div style="margin:2%;width:21%">
              <div style="width:100%;display:flex;align-items:center;">
                <input type="radio" name='main' value=<?= '"' . $r['productId'] . '"' ?>>
                <div style="margin-left:1vw;text-align:center">
                  <img src=<?= '"../index/img/' . $r['productId'] . '.jpg"' ?> style="width: 1em;height:1em;">
                  <?= $r['productName'] ?><br>

                  <small style="font-size: xx-small;">(<?= $r['calorie'] ?>)</small>
                </div>
              </div>
            </div>
          <?php
          }
          $stmt = $dbh->prepare("SELECT * FROM product where productId like 'h%'");
          $stmt->execute();
          ?>
        </div>
        <p id="menu">副菜を2つ選んでください</p>
        <div style="display:flex;flex-direction:row;flex-wrap:wrap;width:50%;">
          <?php
          while ($r =  $stmt->fetch()) {
          ?>
            <div style="margin:2%;width:21%">
              <div style="width:100%;display:flex;align-items:center;">
                <input class="side" type="checkbox" name='sub[]' value=<?= '"' . $r['productId'] . '"' ?>>
                <div style="margin-left:1vw;text-align:center">
                  <img src=<?= '"../index/img/' . $r['productId'] . '.jpg"' ?> style="width: 1em;height:1em;">
                  <?= $r['productName'] ?><br>

                  <small style="font-size: xx-small;">(<?= $r['calorie'] ?>)</small>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <?php
        $stmt = $dbh->prepare("SELECT * FROM product where productId like 'g%'");
        $stmt->execute();
        ?>
        <p id="menu">ご飯を1つ選んでください</p>
        <div style="display:flex;flex-direction:row;">
          <?php
          while ($r =  $stmt->fetch()) {
          ?>
            <div style="margin:1vw;">
              <div style="width:100%;display:flex;align-items:center;">
                <input type="radio" name='rice' value=<?= '"' . $r['productId'] . '"' ?> require>
                <div style="margin-left:1vw;text-align:center">
                  <img src=<?= '"../index/img/' . $r['productId'] . '.jpg"' ?> style="width: 1em;height:1em;">
                  <?= $r['productName'] ?><br>

                  <small style="font-size: xx-small;">(<?= $r['calorie'] ?>)</small>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <button type="submit">確定</button>
      <?php
      } catch (PDOException $e) {
        echo 'DB接続失敗';
      }
      ?>

    </form>

  </main>
  <?php include("../commons/footer.php") ?>
  <script src="./custom.js"></script>
</body>

</html>
