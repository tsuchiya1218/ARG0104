<!DOCTYPE html>
<html lang="ja">

<body>

  <head>
    <?php include("../commons/head.php") ?>
    <title>ARAGIN弁当 注文完了</title>
  </head>
  <header>
    <?php include("../commons/header.php") ?>
  </header>
  <main>
    <h3 style="text-align:center;">注文が完了しました</h3>
    <h4 style="text-align: center;">━━━━━注文情報━━━━━</h4>
    <div class="row justify-content-center">
      <?php
      $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
      $user = '20jy0115';
      $password = '20jy0115';
      $dbh = new PDO($dsn, $user, $password);
      $sql = "SELECT * FROM product";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $prd = $stmt->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);
      $arr = array();
      $ap = array();
      $_q = 0;
      if (isset($_POST['c0000'])) {
        foreach ($_POST['c0000'] as $key => $value) {
          array_push($arr, "c0000");
          array_push($ap, $value);
          $pp[] =   $_POST['cname'][$key];
        }
      }
      foreach ($_POST as $key => $value) {
        if ($key != "c0000" && $key != "cname" && $key != "total") {
          array_push($arr, $key);
          array_push($ap, $value);
        }
      }


      foreach ($arr as $key => $value) {
        $pur = array_pop($ap);
        $orderId = rand(0, 99999999);
        $_SESSION['orderId'] = $orderId;
        $date = date("y-m-d");
        $target_day = "2014-05-28 07:02:54";
        $deliveryTime = date("Y-m-d H:i:s", strtotime($target_day . "+30 hour"));
        $stmt = $dbh->prepare("INSERT INTO menuorder VALUES(:orderId,'20jy0101@jec.ac.jp',:memberId,:productId,:productName,:purchase,:total,:deliveryTime,:deliveryDay)");
        // $stmt = $dbh->prepare("SELECT * FROM menuorder WHERE  $account['id'] = memberId");
        if ($value == "c0000") {
          $p = $prd[$value]['productName'] . "(" . array_pop($pp) . ")";
          $_q++;
        } else {
          $p = $prd[$value]['productName'];
        }
        $stmt->bindParam(':orderId', $orderId);
        $stmt->bindParam(':memberId', $_SESSION['memberId']);
        $stmt->bindParam(':productId', $value);
        $stmt->bindParam(':productName', $p);
        $stmt->bindParam(':purchase', $pur);
        $stmt->bindParam(':total', $_POST['total']);
        $stmt->bindParam(':deliveryTime', $deliveryTime);
        $stmt->bindParam(':deliveryDay', $date);
        if (!$stmt->execute()) {
          print_r($stmt->errorInfo());
        }

        //   while ($row = $stmt->fetch()) {
        //     $result['orderId'] = $row['memberId'];
        //     $result['managementId'] = $row['memberName'];
        //     $result['productId'] = $row['mail'];
        //     $result['productName'] = $row['pass'];
        //     $result['purchase'] = $row['tel'];
        //     $result['total'] = $row['payment'];
        //     $result['deliveryTime'] = $row['memberId'];
        //     $result['deliveryDay'] = $row['memberName'];
        //     $result['mail'] = $row['mail'];
        //     $result['pass'] = $row['pass'];
        //     $result['tel'] = $row['tel'];
        //     $result['payment'] = $row['payment'];

        //   }
      ?>
        <div class="container w-25 border m-1" id="contact">

          <table>
            <tr>
              <th>注文番号:</th>
              <td> <?= $_SESSION['orderId'] ?> </td>
            </tr>
            <tr>
              <th>会員ID:</th>
              <td> <?= $_SESSION['memberId'] ?> </td>
            </tr>
            <tr>
              <th>商品名:</th>
              <td> <?= $p ?></td>
            </tr>
            <tr>
              <th>個数:</th>
              <td> <?= $pur ?>個</td>
            </tr>
            <tr>
              <th>受け取り時間:</th>
              <td> <?= $deliveryTime ?> </td>
            </tr>
            <tr>
              <th>支払い方法:</th>
              <td> <?= $_SESSION['payment'] ?> </td>
            </tr>
            <tr>
              <th>注文日:</th>
              <td> <?= $date ?> </td>
            </tr>
          </table>
          <!-- <table>
          <tr>
            <th>注文番号:</th>
            <td> <?= $result['orderId'] ?> </td>
          </tr>
          <tr>
            <th>会員ID:</th>
            <td> <?= $result['memberId'] ?> </td>
          </tr>
          <tr>
            <th>商品名:</th>
            <td> <?= $result['productName'] ?> </td>
          </tr>
          <tr>
            <th>個数:</th>
            <td> <?= $result['purchase'] ?> </td>
          </tr>
          <tr>
            <th>合計:</th>
            <td> <?= $result['total'] ?> </td>
          </tr>
          <tr>
            <th>受け取り時間:</th>
            <td> <?= $result['deliveryTime'] ?> </td>
          </tr>
          <tr>
            <th>注文日:</th>
            <td> <?= $result['deliveryDay'] ?> </td>
          </tr>
        </table> -->
        </div>
      <?php
      }
      unset($_SESSION['cart']);
      unset($_SESSION['custom']);
      ?>
    </div>
    <div style="display:flex;align-items:center;justify-content:center;">
      <h3>合計金額:</h3>
      <p class="h3"><?= $_POST['total'] ?> 円</p>
    </div>
    <div class="offset-10">
      <a href="../index/index.php">トップに戻る</a>
    </div>

  </main>
  <footer>
    <?php include("../commons/footer.php") ?>
  </footer>
</body>

</html>
