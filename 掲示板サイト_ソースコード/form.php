<?php
// ログイン時のみ入力フォームを表示する
if($login) {
    echo "<a href='logout.php' class=\"log_button\">ログアウト</a>";
    echo <<<HTML
        <!-- 入力フォーム -->
        <form action="index.php" method="POST" enctype="multipart/form-data" onSubmit="return checkSubmit()">
            <div>
                <label for="tweet" class="side">ツイート内容</label>
                <input type="button" value="クリア" onclick="clearTweet()" class="cleartext"/>
                <textarea id="tweet" name="tweet" placeholder="いまどうしてる？" required></textarea>
            </div>
            <div>
                <label for="retweet" class="side">リツイート先</label>
                <input type="button" value="クリア" onclick="clearRetweet()" class="cleartext"/>
                <input id="retweet" type="text" name="retweet" pattern="^@[0-9a-zA-Z]+/[[0-9a-zA-Z]+:[0-9]+$" title="@ユーザID/ディレクトリ:番号"/>
            </div>
            <div>
                <label for="image">画像を添付する</label>
                <input type="file" name="image" accept="image/gif, image/jpeg, image/jpg, image/png"/>
            </div>
            <div>
                公開範囲設定：
                <select name="share" id="openarea">
                    <option value="open">全体</option>
                    <option value="close">限定</option>
                </select>
            </div>
            <input type="submit" name="btn_submit"/>

            <!-- javascript埋め込み -->
            <script type="text/javascript">
                // 確認用ポップアップ
                function checkSubmit() {
	                return confirm("送信しても良いですか？");
                }
                // 入力取り消し用ボタン]
                function clearTweet() {
	                var textareaForm = document.getElementById("tweet");
                    textareaForm.value = '';
                }
                function clearRetweet() {
	                var textForm = document.getElementById("retweet");
                    textForm.value = '';
                }

            </script>
        </form>
HTML;
// ログインされていなければログインボタンを表示
} else {
    echo "<a href='login.php' class=\"log_button\">ログイン</a>";
}
?>