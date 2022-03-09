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
    
    <form method="post" action="conCustom.php" onsubmit="return checkSideDish()">
        <?php
            
               try {
                 $dsn = 'mysql:host=' . "10.64.144.5" . ';dbname=' . "20jy0115";
                 $user = '20jy0115';
                 $password = '20jy0115';
                 $dbh = new PDO($dsn, $user, $password);
                 $stmt = $dbh->prepare("SELECT * FROM product where productId like 'm%'");
                 $stmt->execute();
                 ?>
                 <p>主菜を1つ選んでください</p>
                <div style="display:flex;flex-direction:column;">
                 <?php
                 while ($r =  $stmt->fetch()) {
                     ?>
                     <div style="margin:1vw;"><input type="radio" name='main' value=<?= '"'.$r['productId'].'"' ?>><?= $r['productName'] ?></div>
                     <?php
                 }
                 $stmt = $dbh->prepare("SELECT * FROM product where productId like 'h%'");
                 $stmt->execute();
                 ?>
                 <p>副菜を2つ選んでください</p>
                <div style="display:flex;flex-direction:column;">
                 <?php
                 while ($r =  $stmt->fetch()) {
                     ?>
                     <div style="margin:1vw;"><input type="radio" name='main' value=<?= '"'.$r['productId'].'"' ?>><?= $r['productName'] ?></div>
                     <div><input class="side" type="checkbox" name="aaa[]" value="uuu">uuu</div>

                     <?php
                 }
               } catch (PDOException $e) {
                 echo 'DB接続失敗';
               }
             
        ?>
    </div>
        <!-- <input type="radio" name="aa" value="aa" checked>aa
        <input type="radio" name="aa" value="ii">ii
        <input type="radio" name="aa" value="uu">uu
        <input type="radio" name="aa" value="ee">ee
        <input type="radio" name="aa" value="oo">oo
        <input type="radio" name="aa" value="kk">kk
        <input type="radio" name="aa" value="ss">ss
        <input type="radio" name="aa" value="tt">tt -->

        <p>副菜を2つ選択してください</p>
        <input class="side" type="checkbox" name="aaa[]" value="aaa"checked>aaa
        <input class="side" type="checkbox" name="aaa[]" value="iii"checked>iii
        <input class="side" type="checkbox" name="aaa[]" value="uuu">uuu
        <input class="side" type="checkbox" name="aaa[]" value="eee">eee
        <input class="side" type="checkbox" name="aaa[]" value="ooo">ooo
        <input class="side" type="checkbox" name="aaa[]" value="kkk">kkk
        <input class="side" type="checkbox" name="aaa[]" value="sss">sss
        <input class="side" type="checkbox" name="aaa[]" value="ttt">ttt

        <p>ご飯を1つ選んでください</p>
        <input type="radio" name="aaaa" value="aaaa" checked>aaaa
        <input type="radio" name="aaaa" value="iiii" >iiii

        <input type="submit" name="submit" value="送信">
    </form>

    </main>
    <?php include("../commons/footer.php") ?>
    <script src="./custom.js"></script>
  </div>
</body>

</html>
