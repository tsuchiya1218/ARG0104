<!DOCTYPE html>
<html lang="ja">
  <body>

<head>
  <?php include("../commons/head.php") ?>
  <title>ARAGIN弁当 会員登録</title>
</head>
<header>
  <?php include("../commons/header.php") ?>
</header>
<main>
<?php
if (isset($_POST['user']) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['memberNAME'])  && isset($_POST['tel']) && isset($_POST['payment'])) {
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
  $dbh = new PDO($dsn, $user, $password);
  $stmt = $dbh->prepare("INSERT INTO member VALUES(:user,:memberNAME,:mail,:pass,:tel,:payment)");
  $stmt->bindParam(':user', $_POST['user']);
  $stmt->bindParam(':memberNAME', $_POST['memberNAME']);
  $stmt->bindParam(':mail', $_POST['mail']);
  $stmt->bindParam(':pass', $_POST['pass']);
  $stmt->bindParam(':tel', $_POST['tel']);
  $stmt->bindParam(':payment', $_POST['payment']);


  $stmt->execute();
  ?>

  <div class="container py-4" id="contact">
        <h1>会員登録が完了しました</h1>
        <h2>━━━━━━━━登録情報━━━━━━━━</h2>
        <table>
          <tr>
            <th>会員ID:</th>
            <td> <?= $_POST['user'] ?> </td>
          </tr>
          <tr>
            <th>メールアドレス:</th>
            <td> <?= $_POST['mail'] ?> </td>
          </tr>
          <tr>
            <th>パスワード:</th>
            <td> <?= $_POST['pass'] ?> </td>
          </tr>
          <tr>
            <th>氏名:</th>
            <td> <?= $_POST['memberNAME'] ?> </td>
          </tr>
          <tr>
            <th>電話番号:</th>
            <td> <?= $_POST['tel'] ?> </td>
          </tr>
          <tr>
            <th>支払い方法:</th>
            <td> <?= $_POST['payment'] ?> </td>
          </tr>


        </table>
      </div>
<?php
} else {
  print_r($_POST);
}
?>
</main>
<footer>
  <?php include("../commons/footer.php") ?>
</footer>


<script src="./formCheck.js"></script>
</body>
</html>
