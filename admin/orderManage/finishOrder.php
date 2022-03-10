<!DOCTYPE html>
<html lang="ja">

<body>

  <head>
    <?php include("../../admin/commons/adminHead.php") ?>
    <title>ARAGIN弁当 受け渡し確認</title>
  </head>
  <header>
    <?php include("../../admin/commons/adminHeader.php") ?>
  </header>
  <main>
    <?php
    if (isset($_POST['orderId']) && isset($_POST['managementId']) && isset($_POST['memberId']) && isset($_POST['productId'])  && isset($_POST['productName']) && isset($_POST['purchase']) && isset($_POST['total']) && isset($_POST['deliveryTime'])) {


      $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
      $user = '20jy0115';
      $password = '20jy0115';
      $dbh = new PDO($dsn, $user, $password);
      // $sql->execute();
      $orderhistory = rand(0, 99999999);
      $orderday = date("y-m-d");
      try {
        $dbh->beginTransaction();
        $stmt = $dbh->prepare("INSERT INTO orderhistory VALUES(:orderhistoryId,:managementId,:memberId,:orderId,:productId,:productName,:orderQuantity,:total,:orderDay)");
        $stmt->bindParam(':orderhistoryId', $orderhistory);
        $stmt->bindParam(':managementId', $_POST['managementId']);
        $stmt->bindParam(':memberId', $_POST['memberId']);
        $stmt->bindParam(':orderId', $_POST['orderId']);
        $stmt->bindParam(':productId', $_POST['productId']);
        $stmt->bindParam(':productName', $_POST['productName']);
        $stmt->bindParam(':orderQuantity', $_POST['purchase']);
        $stmt->bindParam(':total', $_POST['total']);
        $stmt->bindParam(':orderDay', $orderday);

        $stmt->execute();

        //DELETE
        $stmt = $dbh->prepare("DELETE FROM menuorder WHERE orderId = :orderId");
        $stmt->bindParam(':orderId', $_POST['orderId']);
        $params = array(':orderId' => 'orderId');
        $stmt->execute();
        $dbh->commit();
      } catch (PDOException $e) {
        $dbh->rollback();
      }
    }
    // while ($row = $stmt->fetch()) {
    //   $result['id'] = $row['memberId'];
    //   $result['name'] = $row['memberName'];
    //   $result['mail'] = $row['mail'];
    //   $result['pass'] = $row['pass'];
    // }
    ?>
    <div class="container py-4" id="contact">
      <h1>受け渡しが完了しました</h1>
      <meta http-equiv="refresh" content="1; url=adminMenuorder.php">

    </div>
    <?php

    ?>
  </main>
  <footer>
    <?php include("../../admin/commons/adminFooter.php") ?>
  </footer>
</body>

</html>
