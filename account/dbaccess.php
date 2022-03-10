<?php
// ログイン処理
function login($mail, $pass)
{
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
  $db = new PDO($dsn, $user, $password);

  $db->query('SET NAMES utf8');
  $sql = "SELECT *  FROM member  WHERE mail = :mail AND  pass = :pass";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':mail', $mail);
  $stmt->bindParam(':pass', $pass);
  $stmt->execute();
  while ($row = $stmt->fetch()) {
    $result['id'] = $row['memberId'];
    $result['name'] = $row['memberName'];
    $result['mail'] = $row['mail'];
    $result['tel'] = $row['tel'];
    $result['payment'] = $row['payment'];
    $result['pass'] = $row['pass'];
    // echo $name;

  }
  if (isset($result)) {
    return $result;
  }
}
// ログイン認証
function authCheck($mail, $pass)
{
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
  $db = new PDO($dsn, $user, $password);
  $db->query('SET NAMES utf8');
  $sql = "SELECT * FROM member WHERE mail = :mail AND pass = :pass ";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':mail', $mail);
  $stmt->bindParam(':pass', $pass);
  $stmt->execute();
  while ($row = $stmt->fetch()) {
    $result['id'] = $row['memberId'];
    $result['name'] = $row['memberName'];
    $result['mail'] = $row['mail'];
    $result['pass'] = $row['pass'];
    $result['tel'] = $row['tel'];
    $result['payment'] = $row['payment'];
  }
  if (isset($result)) {
    return $result;
  }
}
