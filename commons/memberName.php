<?php
session_start();
if (isset($_SESSION['account'])) {
  echo "会員名" . $_SESSION['name'] ;
}
?>
