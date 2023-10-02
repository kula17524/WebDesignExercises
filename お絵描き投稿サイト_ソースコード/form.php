<?php
// ログイン時のみ入力フォームを表示する
if($login) {
    echo "<a href='logout.php' class=\"log_button\">ログアウト</a>";
    echo <<<HTML
        <!-- お絵描き -->
        <div>
            <label for="paint" class="paint">絵を描く</label>
            <canvas id="canvas" width="500" height="300" style="border: solid 1px #000; box-sizing: border-box; text-align: center;"></canvas>
		    <div class="option">
    		    <div class="color">
				    色：
				    <a href="" class="white" data-color="255, 255, 255, 1"></a>
				    <a href="" class="black" data-color="0, 0, 0, 1"></a>
				    <a href="" class="gray" data-color="128, 128, 128, 1"></a>
				    <a href="" class="silver" data-color="192, 192, 192, 1"></a>
				    <a href="" class="red" data-color="255, 0, 0, 1"></a>
				    <a href="" class="pink" data-color="255, 182, 193, 1"></a>
				    <a href="" class="orange" data-color="255, 165, 0, 1"></a>
				    <a href="" class="dalmond" data-color="255, 235, 205, 1"></a>
				    <a href="" class="yellow" data-color="255, 255, 0, 1"></a>
				    <a href="" class="greenyellow" data-color="173, 255, 47, 1"></a>
				    <a href="" class="green" data-color="0, 128, 0, 1"></a>
				    <a href="" class="blue" data-color="0, 0, 255, 1"></a>
				    <a href="" class="aqua" data-color="0, 255, 255, 1"></a>
				    <a href="" class="maroon" data-color="128, 0, 0, 1"></a>
				    <a href="" class="purple" data-color="128, 0, 128, 1"></a>				
			    </div>
			    <div class="bold">
				    太さ：
				    <a href="" class="small" data-bold="1">小</a>
      			    <a href="" class="middle" data-bold="5">中</a>
      			    <a href="" class="large" data-bold="10">大</a>
    		    </div>
  		    </div>
            <input type="button" value="クリア" id="clear" class="cleartext">
  		    <a id="download" href="#" download="canvas.jpg"><button onClick="btnNo=1">ダウンロード</button></a>
        </div>
        <!-- 入力フォーム -->
        <form action="index.php" method="POST" enctype="multipart/form-data" onSubmit="return checkSubmit()">
            <div>
                <label for="tweet" class="side">コメント</label>
                <input type="button" value="クリア" onclick="clearTweet()" class="cleartext"/>
                <textarea id="tweet" name="tweet" placeholder="どんな絵？"></textarea>
            </div>
            <div>
                <label for="image">イラストをアップロードする</label>
                <input type="file" name="image" accept="image/gif, image/jpeg, image/jpg, image/png" required/>
            </div>
            <div>
                公開範囲設定：
                <select name="share" id="openarea">
                    <option value="open">全体</option>
                    <option value="close">限定</option>
                </select>
            </div>
            <input type="submit" name="btn_submit" onClick="btnNo=2"/>

            <!-- javascript埋め込み -->
            <script type="text/javascript">
                // 確認用ポップアップ
                function checkSubmit() {
	                if (btnNo == 2) {
		                return confirm("送信しますか？");
	                } else {
		                return ;
	                }
                }
                // 入力取り消し用ボタン]
                function clearTweet() {
	                var textareaForm = document.getElementById("tweet");
                    textareaForm.value = '';
                }
            </script>
        </form>
HTML;
// ログインされていなければログインボタンを表示
} else {
    echo "<a href='login.php' class=\"log_button\">ログイン</a>";
}
?>