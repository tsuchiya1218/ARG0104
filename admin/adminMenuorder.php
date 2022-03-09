




<!DOCTYPE html>
<html lang="ja">
<head>
<?php include("commons/adminHead.php") ?>
</head>
<body>
	<div class="wrap">
	<?php include("commons/adminHeader.php") ?>
	<main>
	<h1>ARAGIN弁当会員メニュー</h1>

	<h2>注文状況一覧</h2>
    <?php
  $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
  $user = '20jy0115';
  $password = '20jy0115';
  $db = new PDO($dsn, $user, $password);

  $db->query('SET NAMES utf8');
  $sql = 'SHOW TABLES';
$stmt = $dbh->query($sql);

while ($result = $stmt->fetch(PDO::FETCH_NUM)){
    $table_names[] = $result[0];
}

$table_data = array();
foreach ($table_names as $key => $val) {
    $sql2 = "SELECT * FROM $val;";
    $stmt2 = $dbh->query($sql2);
    $table_data[$val] = array();
    while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        foreach ($result2 as $key2 => $val2) {
            $table_data[$val][$key2] = $val2;
        }
    }
}
foreach ($table_data as $key => $val) {
    echo "<h1>$key</h1>";
    if (empty($val)) {
        continue;
    }
    echo "<table border=1 style=border-collapse:collapse;>";
    echo "<tr>";
    foreach ($table_data[$key] as $key2 => $val2) {
    echo "<th>";
    echo $key2;
    echo "</th>";
    }
    echo "</tr>";
    echo "<tr>";
    foreach ($table_data[$key] as $key2 => $val2) {
    echo "<td>";
    echo $val2;
    echo "</td>";
    }
    echo "</tr>";
    echo "</table>";
}
?>

<hr>
<table>
<tr> <th>注文番号 </th><th>受け渡し時間</th><th>ご請求金額</th><th>詳細</th></tr>
<tr><td>20200910001</td><td></td><td class="rt">10,624円</td>
<td>
<button type="button"onclick="location.href='uw08_02.html'">詳細を見る</button>
</td></tr>
<tr><td>20200905010</td><td>2020年09月05日</td><td class="rt">5,240円</td><td>
<button type="button"onclick="location.href=''">詳細を見る</button>
</td></tr>
<tr><td>20200810001</td><td>2020年08月10日</td><td class="rt">9,200円</td><td>
<button type="button"onclick="location.href=''">詳細を見る</button>
</td></tr>
<tr><td>20200801888</td><td>2020年08月01日</td><td class="rt">25,598円</td><td>
<button type="button"onclick="location.href=''">詳細を見る</button>
</td></tr>
</table>





<hr>
<button type="button"onclick="location.href='uw04_01.html'">TOPに戻る</button>



		
	</main>
	<?php include("commons/adminFooter.html")?>
	</div>
</body>
</html>