<?php
session_start();
$_SESSION = array();
session_destroy();
// echo "ログアウトしました。";
header('Location:../index/index.php');
?>
