<?php

// 共通に使う関数を記述
// XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// データベース接続情報
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gs_db";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーのチェック
if ($conn->connect_error) {
    die("データベース接続エラー: " . $conn->connect_error);
}

// データの取得クエリを作成
$sql = "SELECT * FROM gs_an_table WHERE color = '#0000ff'";

// クエリの実行と結果の取得
$result = $conn->query($sql);

// 結果の処理
if ($result->num_rows > 0) {
    // データが存在する場合は取得して表示
    while ($row = $result->fetch_assoc()) {
        $place = $row["place"];
        $address = $row["address"];
        $color = $row["color"];
        ?>
        
        <div class="history">
            <p><?php echo h($place); ?></p>
            <p>、</p>
            <p class="copy"><?php echo h($address); ?></p>
            <p>、</p>
            <button type="button" class="copy_bt" data-copy="<?php echo h($address); ?>">住所をコピー</button>
            <br>
        </div>
        
        <?php
    }
} else {
    echo "データが存在しません";
}

// データベース接続を閉じる
$conn->close();
?>

<style>
    .history{
        position: relative;
        top: 20px;
        display: flex;
        justify-content: center;
        text-align: center;
    }
    .ttt{
        text-align: center;
        font-size: 20px;
    }
    .copy_bt{
        margin-top:15px;
        width:100px;
        height:25px;
    }
</style>

<script>
    const copyButtons = document.querySelectorAll('.copy_bt');
    copyButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const copyText = this.getAttribute('data-copy');
            navigator.clipboard.writeText(copyText);
        });
    });

    
</script>
