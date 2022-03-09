<?php
// ログイン処理
function order($productID)
{
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
  $db = new PDO($dsn, $user, $password);

  $db->query('SET NAMES utf8');
  $sql = "SELECT *  FROM product  WHERE mail = :productid AND  pass = :pass";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':mail', $mail);
  $stmt->bindParam(':pass', $pass);
  $stmt->execute();
  while ($row = $stmt->fetch()) {
    // $result['id'] = $row['id'];
    $result['name'] = $row['memberNAME'];
    $result['mail'] = $row['mail'];
    $result['pass'] = $row['pass'];
  }
  if (isset($result)) {
    return $result;
  }
}
?>
