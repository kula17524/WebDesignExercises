<?php
if( isset($_GET['id']) ):
    $tweet_clear = "ツイートを受け付けました。";
else:
    $tweet_clear = "";
endif; ?>
<?php
// 投稿完了メッセージ
if (!empty($tweet_clear)): ?>
    <p class="tweet_clear"><?php echo $tweet_clear; ?></p>
<?php endif; ?>