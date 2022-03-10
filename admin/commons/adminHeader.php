<nav class="navbar navbar-expand-sm navbar-dark bg-orange mt-3 mb-3">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <?php
            session_start();
            require_once('../../adminAccount/adminLoginDbaccess.php'); // データベースアクセスファイル読み込み
            require_once('../../adminAccount/adminLoginAuth.php'); // ログイン認証ファイル読み込み
            if (!isset($_SESSION['account'])) {
            ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../../index/index.php">トップに戻る</a>
                </li>
            <?php } else { ?>

                <li class="nav-item active">
                    <a class="nav-link" href="../orderManage/adminMenuorder.php">注文状況</a>
                </li>
                <li class="nav-item active"><a class="nav-link" href="../orderManage/orderhistory.php">注文履歴</a></li>
                <li class="nav-item active logout"><a class="nav-link" href="../../account/logout.php">ログアウト</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
