<!DOCTYPE html>
<html lang="ja">

<head>
	<?php include("../commons/head.php") ?>
	<title>ARAGIN弁当 会員登録</title>
</head>

<body>

	<div class="wrap">
		<header>
			<?php include("../commons/header.php") ?>
		</header>

		<main>
			<form action="userEntry.php" method="post">
				<h2>新規会員登録</h2>
				<p>以下のフォームに必要情報を入力してください。</p>
				<p>メールアドレス：<input type="email" name="email"></p>
				<p>パスワード：<input type="password" name="password"></p>
				<p>氏名(全角カナ)：<input type="text" name="name"></p>
				<p>住所：<input type="text" name="address"></p>
				<p>電話番号：<input type="tel" name="tel"></p>
				<p>支払い方法：<input type="radio" id="credit" name="payment" value="">
					<label for="credit">クレジット決済</label>
					<input type="radio" id="cash" name="payment" value="">
					<label for="cash">現金</label>
					<input type="submit" onclick="" value="登録">
					</from>

		</main>
		<footer>
			<?php include("../commons/footer.php") ?>
		</footer>
	</div>
</body>

</html>
