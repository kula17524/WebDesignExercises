<?php
// ログイン時の処理(入力内容により処理を変える)
if(isset($_SERVER['REMOTE_USER'])) {
    @session_start();
    $_SESSION['dirname'] = dirname($_SERVER['SCRIPT_NAME']);
    header('Location: index.php');
} else {
    // 間違った入力なら「ログインしてください」と書かれたページに移動
    echo "ログインしてください";
    echo "<a href='login.php' class=\"log_button\">ログイン</a>";
}
?>