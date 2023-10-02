<?php
// 投稿されたものを表示する
if(file_exists($xmlfile)) {
    $tweets = simplexml_load_file($xmlfile);
    foreach ($tweets as $entry) {
        if ($login || $entry['share'] != "close") {
            $entries[(string)$entry->date] = $entry;
        }
    }
    krsort($entries);
    foreach ($entries as $entry) {
        echo "<article>";
        echo "<div class='entry'>";
        if($entry['share'] == "close") {
            $mk = "限定公開　";
        } else {
            $mk = "公開　";
        }
        echo "<div class='date'>".$mk.$entry->date."</div>";
        echo "<div class='text'>".$entry->text."</div>";
        if($entry -> img != "") {
            echo "<img src='".$entry -> img."' style='width: 80%; display:block; margin:auto;'/>";
        }
        echo "</article>";
        echo "</div>\n";
    }
}
?>