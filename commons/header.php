 <nav class="navbar navbar-expand-sm navbar-dark text-dark bg-pink mt-3 mb-3">

   <a class="navbar-brand" href="../index/index.php"><img src="" alt="ARAGIN弁当" srcset=""></a>
   <ul class="navbar-nav">
     <li class="nav-item active ">
       <a class="nav-link" href="../index/index.php">メニュー</a>
     </li>
     <li class="nav-item active">
       <a class="nav-link" href="../order/cart.php">カート</a>
     </li>
     <?php
      session_start();
      require_once('../account/dbaccess.php'); // データベースアクセスファイル読み込み
      require_once('../account/auth.php'); // ログイン認証ファイル読み込み
      if (isset($_SESSION['account'])) {

      ?>
       <li class="nav-item active"><a class="nav-link" href="/userEntry/userMenu.php">会員メニュー</a></li>
       <li class="nav-item active"><a class="nav-link logout" href="../account/logout.php">ログアウト</a></li>
     <?php
      } else {
      ?>
       <li>
         <div class=" dropdown">
           <button class="btn btn-pink  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             ログイン
           </button>
           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
             <a class="dropdown-item" href="../account/login.php">ユーザーログイン</a>
             <a class="dropdown-item" href="../admin/adminLogin.php">管理者ログイン</a>
           </div>
         </div>
       </li>
       <li class="nav-item active"><a class="nav-link" href="../userEntry/userRegister.php">新規会員登録</a></li>
     <?php
      }
      ?>
   </ul>
   </div>
 </nav>
