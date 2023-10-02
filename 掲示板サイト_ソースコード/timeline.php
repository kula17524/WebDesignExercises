<?php
// 投稿されたものを表示する
if(file_exists($xmlfile)) {
    $tweets = simplexml_load_file($xmlfile);
    foreach ($tweets as $entry) {
        if ($login || $entry['share'] != "close") {
            $entries[(string)$entry->date] = $entry;
        }
    }
    // フォローしているユーザのツイートを表示
    if (file_exists($flwfile)) {
        $follows = simplexml_load_file($flwfile);
        foreach ($follows as $flw) {
            $baseurl = $server."~".$flw['userid']."/".$flw['dir'];
            $twurl = $baseurl."/entries.php?key=".$flw['key'];
            $tweets = simplexml_load_file($twurl);
            foreach($tweets as $entry) {
                $twid = "@".$flw['userid']."/".$flw['dir'].":".$entry['id'];
                $entry->addChild("followid", $twid);
                if ($entry->img != "") {
                    $entry->img = $baseurl."/".$entry->img;
                }
                $entries[(string)$entry->date."@".$flw['userid']] = $entry;
            }
        }
    }
    krsort($entries);
    foreach ($entries as $entry) {
        echo "<article>";
        echo "<div class='entry'>";
        if ($entry->followid != "") {
            echo "<div class='follow'>".$entry->followid."</div>";
        }
        if($entry['share'] == "close") {
            $mk = "●";
        } else {
            $mk = "○";
        }
        echo "<div class='date'>".$mk.$entry->date."</div>";
        echo "<div class='text'>".$entry->text."</div>";
        if($entry -> img != "") {
            echo "<img src='".$entry -> img."' style='width: 80%; display:block; margin:auto;'/>";
        }
        // リツイート
        if($entry->retweet != ""){
            echo "<hr />";
            echo "<div class='retweet'>";
            echo "<div class='follow'>".$entry->retweet."</div>";
            list($at, $userid, $dir, $id) = split('[@/:]', $entry->retweet);
            $baseurl = $server."~".$userid."/".$dir;
            $follows = simplexml_load_file($flwfile);
            $key = "";
            foreach ($follows as $flw) {
                if ($flw['userid'] == $userid) {
                    $key = $flw['key'];
                }
            }
            $retweets = simplexml_load_file($baseurl."/entries.php?key=".$key);
            foreach($retweets as $rtentry){
                if($rtentry['id'] == $id){
                    echo "<div class='date'>".$rtentry->date."</div>";
                    echo "<div class='text'>".$rtentry->text."</div>";
                    if($rtentry->img != ""){
                        echo "<img src='".$baseurl."/".$rtentry->img."' />";
                    }
                }
            }
            echo "</div>";
        }
        echo "</article>";
        echo "</div>\n";
    }
}
?>