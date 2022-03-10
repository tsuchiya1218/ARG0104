 <nav class="navbar navbar-expand-sm navbar-dark text-dark bg-pink mt-3 mb-3">
   <div class="collapse navbar-collapse">
     <a class="navbar-brand" href="../index/index.php">ARAGIN弁当</a>
     <ul class="navbar-nav">
       <li class="nav-item active ">
         <a class="nav-link" href="../index/index.php#menu">メニュー</a>
       </li>

       <?php
        session_start();
        require_once('../account/dbaccess.php'); // データベースアクセスファイル読み込み
        require_once('../account/auth.php'); // ログイン認証ファイル読み込み
        if (isset($_SESSION['account'])) {

        ?>
         <li class="nav-item active">
           <a class="nav-link" href="../order/cart.php">カート</a>
         </li>
         <div class="ml-auto dropdown">
           <button class="btn btn-pink  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">会員メニュー
           </button>
           <div class="dropdown-menu  dropdownmenu" aria-labelledby="dropdownMenuButton">
             <a class="dropdown-item" href="../account/menberInfo.php">会員情報</a>
             <a class="dropdown-item" href="../account/logout.php">ログアウト</a>
           </div>
         </div>
         </li>


       <?php
        } else {
        ?>
         <li>
           <div class="ml-auto dropdown">
             <button class="btn btn-pink  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               ログイン
             </button>
             <div class="dropdown-menu  dropdownmenu" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="../account/login.php">ユーザーログイン</a>
               <a class="dropdown-item" href="../../admin/orderManage/adminLogin.php">管理者ログイン</a>
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
