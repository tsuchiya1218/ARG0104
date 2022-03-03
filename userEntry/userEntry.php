<?php
if (isset($_POST['user'])) { //
  $dsn = 'mysql:dbname=EC;charset=utf8';
  $email = 'メールアドレス';
  $password = 'パスワード';
  $name = '氏名';
  $address = '住所';
  $tel = '電話番号';
  $password = 'パスワード';
  $payment ='支払い方法';
  $dbh = new PDO($dsn, $user, $password);
  $stmt = $dbh->prepare("INSERT INTO USER VALUES(:mail,:password,:name,:address,:tel,:payment)");
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':password', $_POST['password']);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':address', $_POST['address']);
  $stmt->bindParam(':tel', $_POST['tel']);
  $stmt->bindParam(':payment', $_POST['payment']);

  $stmt->execute();
}
