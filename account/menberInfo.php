<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../commons/head.php") ?>
  <title>ARAGIN弁当　会員ページ</title>
</head>

<body>
  <header>
    <?php include("../commons/header.php") ?>
  </header>
  <main>
    <div class="container py-4" id="contact">
      <h2>会員情報</h2>
      <?php

      try {
        $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
        $user = '20jy0115';
        $password = '20jy0115';
        $dbh = new PDO($dsn, $user, $password);
        $stmt = $dbh->prepare("SELECT * FROM member order by ");
        $stmt->execute();

      } catch (PDOException $e) {
        echo $stmt;
        echo 'DB接続失敗';
      }
      ?>
      <table>
        <tr>
          <th>ユーザーID:</th>
          <td>
            <?= $account['id'] ?> </td>
        </tr>
        <tr>
          <th>会員名:</th>
          <td><?= $account['name'] ?></td>
        </tr>
        <tr>
          <th>メールアドレス:</th>
          <td><?= $account['mail'] ?></td>
        </tr>
        <tr>
          <th>電話番号:</th>
          <td><?= $account['tel'] ?></td>
        </tr>
        <tr>
          <th>支払い方法:</th>
          <td><?= $account['payment'] ?></td>
        </tr>
      </table>
<hr>
<h2>注文状況一覧</h2>
            <?php
            $member = $account['id'] ;
            try {
                $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
                $user = '20jy0115';
                $password = '20jy0115';
                $dbh = new PDO($dsn, $user, $password);
                $stmt = $dbh->prepare("SELECT * FROM menuorder WHERE memberId = :memberId");
                $stmt->bindParam(":memberId",$member);
               $stmt->execute();
                // echo 'db接続成功';
            } catch (PDOException $e) {
                // echo 'DB接続失敗';
            }

            while ($row = $stmt->fetch()) {
                $result['orderId'] = $row['orderId'];
                $result['managementId'] = $row['managementId'];
                $result['memberId'] = $row['memberId'];
                $result['productId'] = $row['productId'];
                $result['productName'] = $row['productName'];
                $result['purchase'] = $row['purchase'];
                $result['total'] = $row['total'];
                $result['deliveryTime'] = $row['deliveryTime'];
                $result['deliveryDay'] = $row['deliveryDay'];

            ?>
                    <table>
                        <tr>
                            <th>注文番号：</th>
                            <td><?= $result['orderId'] ?></td>
                        </tr>
                        <tr>
                            <th>商品名：</th>
                            <td><?= $result['productName'] ?></td>
                        </tr>
                        <tr>
                            <th>個数：</th>
                            <td><?= $result['purchase'] ?>個</td>
                        </tr>
                        <tr>
                            <th>合計：</th>
                            <td><?= $result['total'] ?>円（税込み）</td>
                        </tr>
                        <tr>
                            <th>受け渡し時間：</th>
                            <td><?= $result['deliveryTime'] ?></td>
                        </tr>
                        <tr>
                            <th>注文日：</th>
                            <td><?= $result['deliveryDay'] ?></td>
                        </tr>



                        <hr>
                    </table>
            <?php  }

            ?>
            <hr>

      <h2>注文履歴一覧</h2>
        <?php

        try {
          $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
          $user = '20jy0115';
          $password = '20jy0115';
          $dbh = new PDO($dsn, $user, $password);
          $stmt = $dbh->prepare("SELECT * FROM orderhistory WHERE $member = :memberId");
          $stmt->bindParam(":memberId",$member);
          $stmt->execute();
          // echo 'db接続成功';
        } catch (PDOException $e) {
          echo 'DB接続失敗';
        }
        ?>

        <?php
        while ($row = $stmt->fetch()) {
          $result['orderhistoryId'] = $row['orderhistoryId'];
          $result['managementId'] = $row['managementId'];
          $result['memberId'] = $row['memberId'];
          $result['orderId'] = $row['orderId'];
          $result['productId'] = $row['productId'];
          $result['productName'] = $row['productName'];
          $result['orderQuantity'] = $row['orderQuantity'];
          $result['total'] = $row['total'];
          $result['orderDay'] = $row['orderDay'];
        ?>

          <table class="auto-style1">

            <tr>
              <th>注文番号：</th>
              <td><?= $result['orderId'] ?></td>
            </tr>
            <tr>
              <th>商品名：</th>
              <td><?= $result['productName'] ?></td>
            </tr>
            <tr>
              <th>個数：</th>
              <td><?= $result['orderQuantity'] ?>個</td>
            </tr>
            <tr>
              <th>合計：</th>
              <td><?= $result['total'] ?>円（税込み）</td>
            </tr>
            <tr>
              <th>注文日：</th>
              <td><?= $result['orderDay'] ?></td>
            </tr>
            <p></p>
          </table>
          <hr>
          </form>
          <p></p>
        <?php
        }
        ?>

  </main>
  </div>
  <footer>
    <?php include("../commons/footer.php") ?>
  </footer>
</body>

</html>
