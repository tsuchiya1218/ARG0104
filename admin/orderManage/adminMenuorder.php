<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include("../../admin/commons/adminHead.php") ?>
</head>

<body>

    <?php include("../../admin/commons/adminHeader.php") ?>
    <main>
        <div class="container py-4" id="contact">
            <h1>ARAGIN弁当 注文状況</h1>

            <h2>注文状況一覧</h2>
            <?php
            try {
                $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
                $user = '20jy0115';
                $password = '20jy0115';
                $dbh = new PDO($dsn, $user, $password);
                $stmt = $dbh->prepare("SELECT * FROM menuorder");
                $stmt->execute();
                // echo 'db接続成功';
            } catch (PDOException $e) {
                echo 'DB接続失敗';
            }
            ?>

            <?php
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
                <form action="finishOrder.php" method="post">
                    <table>
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


                        <tr>
                            <td><input type="submit" value="受け渡し完了"></td>
                        </tr>
                        <input type="text" name="orderId" value=<?= '"' . $result['orderId'] . '"' ?> hidden>
                        <input type="text" name="managementId" value=<?= '"' . $result['managementId'] . '"' ?> hidden>
                        <input type="text" name="memberId" value=<?= '"' . $result['memberId'] . '"' ?> hidden>
                        <input type="text" name="productId" value=<?= '"' . $result['productId'] . '"' ?> hidden>
                        <input type="text" name="productName" value=<?= '"' . $result['productName'] . '"' ?> hidden>
                        <input type="text" name="purchase" value=<?= '"' . $result['purchase'] . '"' ?> hidden>
                        <input type="text" name="total" value=<?= '"' . $result['total'] . '"' ?> hidden>
                        <input type="text" name="deliveryTime" value=<?= '"' . $result['deliveryTime'] . '"' ?> hidden>
                        <hr>
                    </table>
                </form>
            <?php  } ?>
            <hr>

            <p></p>


            <hr>
        </div>



    </main>
    <?php include("../../admin/commons/adminFooter.php") ?>

</body>

</html>
