<?php
// エラーを表示する
ini_set("display_errors", 1);
// 日本時間に設定
date_default_timezone_set('Asia/Tokyo');
// ウェブサーバ
$server = "http://webdesign.center.wakayama-u.ac.jp:60080/";
// タイトルとXMLファイルのセット
$title = "マイツイート";
$xmlfile = "writing/tweets.xml";
$flwfile = "writing/follows.xml";
// 公開用キー
$sharekey = "0414";
// 投稿完了メッセージ
$tweet_clear = null;
?>