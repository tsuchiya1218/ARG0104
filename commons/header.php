 <nav class="navbar navbar-expand-sm navbar-dark bg-info mt-3 mb-3">

   <a class="navbar-brand" href="../index/index.php"><img src="" alt="ARAGIN弁当" srcset=""></a>
   <button type="button" class="btn btn-info" >ログイン</button>
   <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" data-reference="parent">
     <span class="sr-only"></span>
   </button>
   <div class="collapse navbar-collapse">
     <ul class="navbar-nav">
       <li class="nav-item active">
         <a class="nav-link" href="../index/index.php">メニュー</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="../order/cart.php">カート</a>
       </li>
       <?php
        require_once('../account/dbaccess.php'); // データベースアクセスファイル読み込み
        require_once('../account/auth.php'); // ログイン認証ファイル読み込み
        if (isset($_SESSION['account'])) { //TODO:ログインしているか判定
          print '<li class="nav-item active"><a class="nav-link" href="/userEntry/userMenu.php">会員メニュー</a></li>';
        } else {
          print '<li>
          <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
          <a  class="dropdown-item" href="../account/login.php">ログイン</a>
          <a  class="dropdown-item" href="../admin/adminLogin.php">管理者ログイン</a>
          </div></li>
            <li class="nav-item active"><a  class="nav-link" href="../userEntry/userRegister.php">新規会員登録</a></li>';
        }
        ?>
     </ul>
   </div>
 </nav>

