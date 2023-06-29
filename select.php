

<div class="title">
    <select name="color" id="color">
        <option value="">--物件の種類--</option>
        <option value="#ff0000">住宅</option>
        <option value="#008000">飲食店</option>
        <option value="#0000ff">娯楽施設</option>
        <option value="#ffff00">仕事</option>
        <option value="#ffa500">その他</option>
    </select>

    <button id="choice">履歴を確認</button>
</div>


<div id="result"></div>

<script>
    document.getElementById("choice").addEventListener("click", function() {
        var selectedColor = document.getElementById("color").value;

        if (selectedColor === "#ff0000") {
            // Ajaxリクエストを送信し、結果を取得して表示する
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "choice1.php?color=ff0000", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else if (selectedColor === "#008000") {
            // Ajaxリクエストを送信し、結果を取得して表示する
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "choice2.php?color=008000", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else if (selectedColor === "#0000ff") {
            // Ajaxリクエストを送信し、結果を取得して表示する
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "choice3.php?color=0000ff", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else if (selectedColor === "#ffff00") {
            // Ajaxリクエストを送信し、結果を取得して表示する
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "choice4.php?color=ffff00", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else if (selectedColor === "#ffa500") {
            // Ajaxリクエストを送信し、結果を取得して表示する
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "choice5.php?color=ffa500", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else {
            // 物件の種類が選択されていない場合の処理
            alert("物件の種類を選択してください");
        }
    });
</script>

<style>
    .title{
        margin: 50px auto;
        text-align:center;
        display: flex;
        justify-content: center;
    }
</style>
