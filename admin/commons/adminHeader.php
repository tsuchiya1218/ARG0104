<nav class="navbar navbar-expand-sm navbar-dark bg-warning mt-3 mb-3">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../admin/adminIndex.php">メニュー</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../order/cart.php">カート</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../order/cart.php">カート</a>
            </li>
            <?php
            require_once('../account/dbaccess.php'); // データベースアクセスファイル読み込み
            require_once('../account/auth.php'); // ログイン認証ファイル読み込み
            if (isset($_SESSION['account'])) { //TODO:ログインしているか判定
            ?>
                <li class="nav-item active"><a class="nav-link" href="/userEntry/userMenu.php">管理者メニュー</a></li>
            <?php }
            ?>
        </ul>
    </div>
</nav>
