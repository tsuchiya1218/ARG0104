

<?php
session_start();

if(isset($_POST['email'])) {
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
$dbh = new PDO($dsn,$user,$password);

$stmt = $dbh->prepare("SELECT * FROM member WHERE mail=:mail");
$stmt->bindParam(':mail', $_POST['email']);
$stmt->execute();
if($rows = $stmt->fetch()) {
if($rows["pass"] ==  $_POST['password']) {
print "<p>ログイン成功</p>";
}else {
print "<p>ログイン失敗</p>";
}
}else {
print "<p>ログイン失敗</p>";
}
}

?>
