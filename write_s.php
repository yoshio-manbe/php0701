<?php
// データベース接続情報
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gs_db";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);
// フォームデータの取得とエスケープ処理
$name = array();
$state = array();
$month = array();
$address = array();
$date = array();

for ($i = 1; $i <= 5; $i++) {
    $name[] = $conn->real_escape_string($_POST['name' . $i]);
    $state[] = $conn->real_escape_string($_POST['state' . $i]);
    $month[] = $conn->real_escape_string($_POST['month' . $i]);
    $address[] = $conn->real_escape_string($_POST['address' . $i]);
    $date[] = $conn->real_escape_string($_POST['date' . $i]);
}

// データベースに挿入するためのSQLクエリの作成
$sql = "INSERT INTO gs_an_table2 (name, state, month, address, date) VALUES ";

$values = array();
for ($i = 0; $i < 5; $i++) {
    $values[] = "('" . $name[$i] . "', '" . $state[$i] . "', '" . $month[$i] . "', '" . $address[$i] . "', '" . $date[$i] . "')";
}

$sql .= implode(", ", $values);

// SQLクエリの実行
if ($conn->query($sql) === TRUE) {
    echo "データが正常に挿入されました";
} else {
    echo "エラー: " . $sql . "<br>" . $conn->error;
}

// データベース接続のクローズ
$conn->close();
?>

<a href="form_s.php">戻る</a>
