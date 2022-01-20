<?php
    //管理者じゃないとはじく 
    // 1. (select user.Admin from user where user.id = ?) == true //DB設計
    // 2. user.id < 1000  
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ARAGIN弁当 商品登録ページ</title>
    <link rel="stylesheet" href="/css/common.css">
</head>
<body>
	<div class="wrap">
	<?php include("../commons/header.php") ?>
	<main>
	</main>
	<?php include("../commons/footer.html")?>
	</div>
</body>
</html>