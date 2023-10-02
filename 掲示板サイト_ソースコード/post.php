<?php
// ログイン処理
@session_start();
if(isset($_SESSION['dirname']) && 
    $_SESSION['dirname'] == dirname($_SERVER['SCRIPT_NAME'])) {
    $login = true;
} else {
    $login = false;
}
// 投稿の処理(XMLファイルへの書き込み)
if($login && !empty($_POST['tweet'])) {
    // 日時、ID、投稿された文章をXMLファイルに書き込む
    $now = date("Y-m-d H:i:s");
    $tweets = simplexml_load_file($xmlfile);
    $newid = $tweets -> count() + 1;
    $entry = $tweets -> addChild("entry");
    $entry -> addAttribute("id", $newid);
    $entry -> addAttribute("share", $_POST['share']);
    $entry -> addChild("date", $now);
    if(isset($_POST['retweet'])) {
        $entry->addChild("retweet", $_POST['retweet']);
    }
    $entry -> addChild("text", $_POST['tweet']);
    // 画像も投稿されていたら画像も保存する
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        $tmpfile = $_FILES['image']['tmp_name'];
        $imgfile = "./img/".$newid."_".$_FILES['image']['name'];
        move_uploaded_file($tmpfile, $imgfile);
        $entry -> addChild("img", $imgfile);
    }
    file_put_contents($xmlfile, $tweets -> asXML());
    $tweet_clear = "ツイートを受け付けました。";
}
?>