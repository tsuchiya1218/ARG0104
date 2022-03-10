<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../../admin/commons/adminHead.php") ?>
</head>

<body>
  <?php include("../../admin/commons/adminHeader.php") ?>
  <div class="wrap">

    <main>
      <div class="container py-4" id="contact">
        <h1>ARAGIN弁当 注文履歴</h1>

        <h2>注文履歴一覧</h2>
        <?php
        try {
          $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
          $user = '20jy0115';
          $password = '20jy0115';
          $dbh = new PDO($dsn, $user, $password);
          $stmt = $dbh->prepare("SELECT * FROM orderhistory");
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
              <th>注文履歴番号：</th>
              <td><?= $result['orderhistoryId'] ?></td>
            </tr>
            <tr>
              <th>注文番号：</th>
              <td><?= $result['orderId'] ?></td>
            </tr>
            <tr>
              <th>管理者ID：</th>
              <td><?= $result['managementId'] ?></td>
            </tr>
            <tr>
              <th>会員番号：</th>
              <td><?= $result['memberId'] ?></td>
            </tr>
            <tr>
              <th>商品ID：</th>
              <td><?= $result['productId'] ?></td>
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

        <hr>



      </div>
    </main>
    <?php include("../../admin/commons/adminFooter.php") ?>

</body>

</html>
