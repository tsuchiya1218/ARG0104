
<?php
echo "cc";
if (isset($_POST) && isset($_POST['memberID']) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['memberNAME'])&& isset($_POST['tel'])&& isset($_POST['payment'])) { //
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
  $dbh = new PDO($dsn, $user, $password);
  $stmt = $dbh->prepare("INSERT INTO member VALUES(:memberID,:mail,:pass,:memberNAME,:tel,:payment)");
  $stmt->bindParam(':memberID', $_POST['memberID']);
  $stmt->bindParam(':mail', $_POST['mail']);
  $stmt->bindParam(':pass', $_POST['pass']);
  $stmt->bindParam(':memberNAME', $_POST['memberNAME']);
  $stmt->bindParam(':tel', $_POST['tel']);
  $stmt->bindParam(':payment', $_POST['payment']);

  $result=$stmt->execute();
  var_dump($result); // ここで値を確認
  exit();
}else{
  print_r( $_POST);
 
}
?>
