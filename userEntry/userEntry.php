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
    if (isset($_POST['memberId']) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['memberName'])  && isset($_POST['tel']) && isset($_POST['payment'])) {
      $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
      $user = '20jy0115';
      $password = '20jy0115';
      $dbh = new PDO($dsn, $user, $password);
      $sql = $dbh->prepare("SELECT count(*) as cnt FROM member  WHERE memberId = :memberId");
      $sql->bindParam(':memberId', $_POST['memberId']);
      $sql->execute();
      if ($sql->fetch()['cnt'] == 0) {
        $stmt = $dbh->prepare("INSERT INTO member VALUES(:memberId,:memberName,:mail,:pass,:tel,:payment)");
        $stmt->bindParam(':memberId', $_POST['memberId']);
        $stmt->bindParam(':memberName', $_POST['memberName']);
        $stmt->bindParam(':mail', $_POST['mail']);
        $stmt->bindParam(':pass', $_POST['pass']);
        $stmt->bindParam(':tel', $_POST['tel']);
        $stmt->bindParam(':payment', $_POST['payment']);
        $stmt->execute();
      } else {
        $_SESSION['errmsg'] = '登録済みのIDです。';
        $errmsg = $_SESSION['errmsg'];
        header('Location:userRegister.php');
      }
      while ($row = $stmt->fetch()) {
        $result['id'] = $row['memberId'];
        $result['name'] = $row['memberName'];
        $result['mail'] = $row['mail'];
        $result['pass'] = $row['pass'];
        $result['tel'] = $row['tel'];
        $result['payment'] = $row['payment'];

      }
    ?>
      <div class="container py-4" id="contact">
        <h1>会員登録が完了しました</h1>
        <h2>━━━━━━━━登録情報━━━━━━━━</h2>
        <table>
          <tr>
            <th>ユーザーID:</th>
            <td> <?= $_POST['memberId'] ?> </td>
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
            <td> <?= $_POST['memberName'] ?> </td>
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
        <p>※忘れないようスクリーンショット等で控えてください。</p>
      </div>
    <?php
    }
    ?>
  </main>
  <footer>
    <?php include("../commons/footer.php") ?>
  </footer>
  <script src="./formCheck.js"></script>
</body>

</html>
