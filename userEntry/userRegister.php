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
			<h3 class="error"><?php
												if (isset($_SESSION['errmsg'])) {
													print($_SESSION['errmsg']);
												}
												?></h3>
			<table>
				<form action="userEntry.php" method="post">

					<h2>新規会員登録</h2>
					<p>以下のフォームに必要情報を入力してください。</p>

					<tr>
						<th><label for="username">ユーザーID：</label></th>
						<td><input type="text" name="memberId" class="form-control" id="id" placeholder="半角数字6~8桁" maxlength="8" pattern="[A-Za-z0-9]{6,}"></td>
					</tr>
					<tr>
						<th><label for="email" class="form-label">メールアドレス：</label></th>
						<td><input type="email" name="mail" class="form-control" placeholder="example@xxx.com" required></td>
					</tr>
					<tr>
						<th><label for="exampleInputPassword1" class="form-label">パスワード(半角数字6~8桁):</label></th>
						<td><input type="password" name="pass" class="form-control" id="password" maxlength="8" plaseholder="半角英数字6~8文字" pattern="[A-Za-z0-9]{6,}" required></td>
					</tr>
					<tr>
						<th><label for="exampleInputName" class="form-label">氏名(全角カナ)：</label></th>
						<td><input type="text" class="form-control" name="memberName" required></td>
					</tr>
					<tr>
						<th><label for="exampleInputNumber" class="form-label">電話番号：</label></th>
						<td><input type="tel" name="tel" class="form-control" required></td>
					</tr>
					<tr>
						<th>支払い方法：</th>


						<td><input type="radio" id="credit" name="payment" value="クレジットカード" required checked>
							<label for="credit">クレジット決済</label>
							<input type="radio" id="cash" name="payment" value="現金">
							<label for="cash">現金</label>

						</td>
						<td><input type="submit" class="clickbtn btn" value="登録"></td>

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
