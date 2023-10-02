<?php
// 二重投稿防止
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location:http://webdesign.center.wakayama-u.ac.jp:60080/~s266047/mypaints/index.php?id=1");
    exit();
}
?>