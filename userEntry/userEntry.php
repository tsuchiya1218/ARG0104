<?php
if(isset($_POST['user'])) {//
$dsn='mysql:dbname=EC;charset=utf8';
$user='ユーザー名';
$password='パスワード';
$dbh = new PDO($dsn,$user,$password);
$stmt = $dbh->prepare("INSERT INTO USER VALUES(:mail,:password,:name,:tel)");
$stmt->bindParam(':email', $_POST['mail']);
$stmt->bindParam(':password', $_POST['password']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':tel', $_POST['tel']);
$stmt->bindParam(':payment', $_POST['payment']);
$stmt->execute();
}
