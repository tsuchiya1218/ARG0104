<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("../commons/head.php") ?>
  <title>ARAGIN弁当 カスタムページ</title>
</head>

<body>
  <div class="wrap">
    <?php include("../commons/header.php") ?>
    <main>
    <table>
        <tr>
            <th>選択した主菜</th>
            <td><?=$_POST["aa"]?></td>
        </tr>
        <tr>
            <th>選択した副菜</th>
            <td><?php
				if (isset($_POST["aaa"]) && is_array($_POST["aaa"])) {
    				$how = implode("<br>", $_POST["aaa"]);
    			}
    			echo $how;
    		?></td>
        </tr>
        <tr>
            <th>選択したご飯</th>
            <td><?=$_POST["aaaa"]?></td>
        </tr>
    </table>

    </main>
    <?php include("../commons/footer.php") ?>
  </div>
</body>

</html>