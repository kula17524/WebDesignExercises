<?php
// ログアウト処理(クッキーの削除)
session_start();
$_SESSION = array();
if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", '', time() - 1800, '/');
}
session_destroy();
header('Location:index.php');
exit();
?>