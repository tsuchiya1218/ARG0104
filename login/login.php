<!DOCTYPE html>
<html lang="ja">

<?php include("../commons/head.php") ?>


<body>
  <div class="wrap">
    <?php include("../commons/header.php") ?>
    <main>
      <form action="" method="" name="">
        <h2>ログイン</h2>
        <hr><br>

        <span id="span1">
          <p>ユーザーid:</p>
        </span><input type="text" id="id" class="" maxlength="8" /><br>
        <span id="span2">
          <p>パスワード:</p>
        </span>
        <input type="password" id="password" class="password">
        <button onclick="isHanEisu('id','password')">ログイン</button>
      </form>
      <script src="../js/login.js"></script>
    </main>
    <?php include("../commons/footer.html") ?>
  </div>
</body>

</html>