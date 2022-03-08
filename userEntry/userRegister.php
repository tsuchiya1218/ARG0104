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
			<table>
				<form action="userEntry.php" method="post" >

					<h2>新規会員登録</h2>
					<p>以下のフォームに必要情報を入力してください。</p>

					<tr>
						<th><label for="username">会員ID：</label></th>
						<td><input type="text" name="user" class="form-control" placeholder="半角数字6~8桁" minlength="6" maxlength="8"></td>
					</tr>
					<tr>
						<th><label for="email" class="form-label">メールアドレス：</label></th>
						<td><input type="email" name="mail" class="form-control" placeholder="example@xxx.com" required></td>
					</tr>
					<tr>
						<th><label for="exampleInputPassword1" class="form-label">パスワード</label></th>
						<td><input type="password" name="pass" class="form-control" id="password" maxlength="8" plaseholder="半角英数字6~8文字" required></td>
					</tr>
					<tr>
						<th><label for="exampleInputName" class="form-label">氏名(全角カナ)：</label></th>
						<td><input type="text" class="form-control"  name="memberNAME" required></td>
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
						<td><input type="submit" onclick="check()" class="clickbtn btn" value="登録"></td>

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
