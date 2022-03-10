<?php
// ログイン処理
function adminLogin($adminmail, $adminpass)
{
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
  $db = new PDO($dsn, $user, $password);

  $db->query('SET NAMES utf8');
  $sql = "SELECT *  FROM management WHERE managementId = :managementId AND  managementPass = :managementPass";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':managementId', $adminmail);
  $stmt->bindParam(':managementPass', $adminpass);
  $stmt->execute();
  while ($row = $stmt->fetch()) {
    // $result['id'] = $row['memberId'];
    $result['name'] = $row['managementName'];
    $result['mail'] = $row['managementId'];
    $result['pass'] = $row['managementPass'];
    $name = $row['managementName'];
    $_SESSION['managementName'] = $name;
    // echo $name;

  }
  if (isset($result)) {
    return $result;
  }
}
// ログイン認証
function adminAuthCheck($adminmail, $adminpass)
{
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
  $db = new PDO($dsn, $user, $password);

  $db->query('SET NAMES utf8');
  $sql = "SELECT *  FROM management  WHERE mail = managementId AND  pass = :managementPass";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':managementId', $adminmail);
  $stmt->bindParam(':managementPass', $adminpass);
  $stmt->execute();
  while ($row = $stmt->fetch()) {
    // $result['id'] = $row['memberId'];
    $result['name'] = $row['managementName'];
    $result['mail'] = $row['managementId'];
    $result['pass'] = $row['managementPass'];
    $name = $row['managementName'];
    $_SESSION['managementName'] = $name;
    // echo $name;
  }
}
