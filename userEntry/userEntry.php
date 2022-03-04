<?php
if (isset($_POST['user'])) { //
  $dsn = 'mysql:dbname=20jy0115;charset=utf8';
  $user = '20jy0115';
  $password = '20jy0115';
  $dbh = new PDO($dsn, $user, $password);
  $stmt = $dbh->prepare("INSERT INTO member VALUES(:mail,:pass,:memberNAME,:tel,:payment)");
  $stmt->bindParam(':mail', $_POST['mail']);
  $stmt->bindParam(':pass', $_POST['pass']);
  $stmt->bindParam(':memberNAME', $_POST['memberNAME']);
  $stmt->bindParam(':tel', $_POST['tel']);
  $stmt->bindParam(':payment', $_POST['payment']);

  $stmt->execute();
}
