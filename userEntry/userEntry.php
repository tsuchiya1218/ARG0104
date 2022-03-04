
<?php
echo "cc";
if (isset($_POST) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['memberNAME'])) { //
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
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
}else{
  print_r( $_POST);
}
?>
