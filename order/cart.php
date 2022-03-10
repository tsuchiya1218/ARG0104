<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../commons/head.php") ?>
  <title>ARAGIN弁当 注文ページ</title>
</head>

<body>
  <div class="wrap">
    <?php include("../commons/header.php") ?>
    <main>
      <?php
      try {
        $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
        $user = '20jy0115';
        $password = '20jy0115';
        $dbh = new PDO($dsn, $user, $password);
        $stmt = $dbh->prepare("SELECT * FROM product ");
        $stmt->execute();
        $product = $stmt->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);
        $insertArray = array();

      ?>
        <form action="./orderfinish.php" method="post" id="prdForm" onsubmit="return calcPrice()">
          <?php
          $sum = 0;
          if (isset($_POST['c0000'])) {
            if (!isset($_SESSION['custom'])) {
              $_SESSION['custom'] = array();
            }
            foreach ($_POST['c0000'] as $key => $value) {
              if (!is_array($value)) {
                unset($_SESSION['custom'][$key]);
              } else {
                array_push($_SESSION['custom'], $value);
              }
            }
          }
          if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array(array());
          } ?>
          <table>
            <?php

            if (isset($_SESSION['custom']) && !empty($_SESSION['custom']) && is_array($_SESSION['custom'])) {
              $i = 0;
              $c_sumcal = 0;
              $c_quantity = 0;
              $p_name = "";
              foreach ($_SESSION['custom'] as $k => $v) {
                $c_sumcal = 0;
                $c_quantity = 0;
                $p_name = "";

            ?>
                <tr class="custom" id=<?= '"custom' . $k . '"' ?>>
                  <td>カスタム弁当</td>
                  <td style="font-size:smaller">(
                    <?php
                    foreach ($v as $key => $value) {
                      $c_sumcal = $c_sumcal + substr($product[$value]['calorie'], 0, strpos($product[$value]['calorie'], "kcal"))
                    ?>
                      <?php $p_name = $p_name . " " . $product[$value]['productName'];
                      echo  $product[$value]['productName'] ?>
                      <?php
                    }
                      ?>) </td>
                  <td class="purchase">1個</td>
                  <td class="price">500円</td>
                  <td style="font-size:smaller"><?= $c_sumcal ?>kcal</td>
                  <td><button type="button" onclick=<?= "removeCustom(" . $k . ")" ?>>削除</button></td>
                  <td>
                    <input class="val" type="text" name=<?= '"c0000[' . $k . ']"' ?> value="0" hidden>
                    <input type="text" name=<?= '"cname[' . $k . ']"' ?> value=<?= '"' . $p_name . '"' ?> hidden>
                  </td>
                </tr>

              <?php
                $sum = $sum + 500;
                $c_quantity++;
              }
              array_push($insertArray, [
                "memberId" => $_SESSION['memberId'],
                "productId" => "c0000",
                "purchase" => $c_quantity,
                "productName" => "カスタム弁当 " . $p_name,
                "price" => 500,
                "total" => $sum,
              ]);
            }
            $n_sum = 0;
            foreach ($_POST as $key => $value) {
              if ($key != "c0000") {
                if ($value != -999 && $value != 0) {
                  $_SESSION['cart'][$key] =  (isset($_SESSION['cart'][$key]) ? $_SESSION['cart'][$key] : 0) + $value;
                  $n_sum = $n_sum + ($product[$key]['price'] * $_SESSION['cart'][$key]);
                } else {
                  if ($value == -999 && isset($_SESSION['cart'][$key])) unset($_SESSION['cart'][$key]);
                }
              }
            }
            foreach ($product as $key => $value) {
              if (!empty($_SESSION['cart'][$key])) {
                array_push($insertArray, [
                  "memberId" => "" . $_SESSION['memberId'],
                  "productId" => $key,
                  "purchase" => $_SESSION['cart'][$key],
                  "productName" => $product[$key]['productName'],
                  "price" => $product[$key]['price'],
                  "total" => $product[$key]['price'] * $_SESSION['cart'][$key],
                ]);
              ?><tr class=<?= '"' . $key . '"' ?>>
                  <td>
                    <?= $product[$key]['productName'] ?>
                  </td>
                  <td></td>
                  <td class="purchase"><?= $_SESSION['cart'][$key] ?>個</td>
                  <td class="price"><?php echo  $n_sum = $n_sum + $product[$key]['price'] * $_SESSION['cart'][$key] ?>円</td>
                  <td style="font-size:smaller;"><?= $product[$key]['calorie'] ?></td>
                  <td><button type="button" onclick=<?= "removeThis('" . $key . "')" ?>>削除</button></td>
                  <td>
                    <input class="val" type="text" name=<?= '"' . $key . '"' ?> value="0" hidden>
                  </td>
                </tr>

          <?php


              }
            }
          } catch (PDOException $e) {
          }

          // $_POST = array();
          $sum = $sum + $n_sum;
          ?>
          </table>
          <input type="text" name="total" id="sumval" value="0" hidden>
          <p id="sum" class="sum"><?= '合計:' . $sum ?>円</p>
          <?php if ($sum > 0) { ?>
            <button type="submit">購入する</button>
          <?php } else {
            echo 'カートが空です！';
          } ?>
        </form>
    </main>
    <?php include("../commons/footer.php") ?>
    <script>
      function removeThis(str) {
        document.querySelectorAll("." + str).forEach(element => {
          element.remove();
        });
        sumcal();
      }

      function removeCustom(str) {
        document.getElementById("custom" + str).remove();
        sumcal();
      }

      function sumcal() {
        let sum = 0;
        document.querySelectorAll(".price").forEach((e) => {
          sum += Number(e.innerText.substr(0, e.innerText.indexOf("円")));
        })
        document.getElementById("sumval").value = sum;
        document.getElementById("sum").innerText = sum + "円";
      }
      sumcal();

      function calcPrice() {
        document.querySelectorAll("tr").forEach((e) => {
          t = e.querySelector(".purchase").innerText;
          num = Number(t.substr(0, t.indexOf(
            "個")));
          e.querySelector(".val").value = num;
          console.log(e.querySelector(".val"));
        })
        return true;
      }
    </script>
  </div>
</body>

</html>
