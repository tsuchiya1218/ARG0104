<!DOCTYPE html>
<html lang="ja">

<head>
	<?php include("../commons/head.php") ?>
	<title>ARAGIN弁当 会員登録</title>
</head>

<body>

	<header>
		<?php include("../commons/header.php") ?>
	</header>

	<main>
		<div class="container py-4" id="contact">
			<form action="userEntry.php" method="post" name="user">
				<h2>新規会員登録</h2>
				<p>以下のフォームに必要情報を入力してください。</p>
				<p>メールアドレス：<input type="email" name="email" placeholder="example@xxx.com" required></p>
				<p>パスワード(半角英数字6~8文字)：<input type="password" name="password" id="password" maxlength="8" required></p>
				<p>氏名(全角カナ)：<input type="text" name="name" required></p>
				<p>住所：<input type="text" name="address" required></p>
				<p>電話番号：<input type="tel" name="tel" required></p>
				<p>支払い方法：<input type="radio" id="credit" name="payment" value="" required>
					<label for="credit">クレジット決済</label>
					<input type="radio" id="cash" name="payment" value="">
					<label for="cash">現金</label>
					<input type="submit" onclick="check()" class="clickbtn btn" value="登録">
					</from>
		</div>
	</main>
	<footer>
		<?php include("../commons/footer.php") ?>
	</footer>

</body>
<script src="../formCheack.js"></script>

</html>
