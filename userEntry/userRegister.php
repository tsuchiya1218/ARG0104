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
				<table>
					<h2>新規会員登録</h2>
					<p>以下のフォームに必要情報を入力してください。</p>
					<tr>
						<th><label for="exampleInputEmail1" class="form-label">メールアドレス：</label></th>
						<td><input type="email" name="mail" placeholder="example@xxx.com" required></td>
					</tr>
					<tr>
						<th><label for="exampleInputPassword1" class="form-label">パスワード(半角英数字6~8文字)</label></th>
						<td><input type="password" name="pass" id="password" maxlength="8" required></td>
					</tr>
					<tr>
						<th><label for="exampleInputName" class="form-label">氏名(全角カナ)：</label></th>
						<td><input type="text" name="memberNAME" required></td>
					</tr>
					<tr>
						<th><label for="exampleInputNumber" class="form-label">電話番号：</label></th>
						<td><input type="tel" name="tel" required></td>
					</tr>
					<tr>
						<th>支払い方法：</th>
						<label for="credit">クレジット決済</label>
						<td><input type="radio" id="credit" name="payment" value="" required>
							<input type="radio" id="cash" name="payment" value="">
							<label for="cash">現金</label>
							<input type="submit" onclick="check()" class="clickbtn btn" value="登録">




						</td>
					</tr>
				</table>
			</form>
		</div>
	</main>
	<footer>
		<?php include("../commons/footer.php") ?>
	</footer>

</body>
<script src="./formCheck.js"></script>

</html>
