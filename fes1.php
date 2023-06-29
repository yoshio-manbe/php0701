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
$sql = "SELECT * FROM gs_an_table2 ";

// クエリの実行と結果の取得
$result = $conn->query($sql);

// 結果の処理
if ($result->num_rows > 0) {
    // データが存在する場合は取得して表示
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $state = $row["state"];
        $month = $row["month"];
        $address = $row["address"];
        $date = $row["date"];
        ?>
        
        <div class="history">
            <textarea class="name"><?php echo h($name); ?></textarea>
            <p>、</p>
            <p><?php echo h($state); ?></p>
            <p>、</p>
            <textarea class="address"><?php echo h($address); ?></textarea>
            <p>、</p>
            <p><?php echo h($month); ?></p>
            <p>/</p>
            <p><?php echo h($date); ?></p>

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
    textarea{
        font-size: 15px;
        text-align: center;
        height: 20px;
        width: 250px;
    }
    
</style>
