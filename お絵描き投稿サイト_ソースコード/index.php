<?php
// 共通設定部分のPHPファイルを呼び出す
include("config.php");
// ログイン・投稿処理のPHPファイルを呼び出す
include("post.php");
// 二重投稿防止のPHPを呼び出す
include("repost.php");
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/canvas.css">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <canvas id="background"></canvas>
        <section id="body">
            <h1><?php echo $title; ?></h1>
<?php
// 投稿完了・エラーメッセージのPHPファイルを呼び出す
include("message.php");
// 入力フォームのPHPファイルを呼び出す
include("form.php");
?>
            <div>
<?php
// ツイート表示部分のPHPファイルを呼び出す
include("timeline.php");
?>
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/background.js"></script>
    </body>
    <script src="js/paint.js"></script>
</html>