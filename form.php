<?php
// write.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームデータを取得
    $formData = $_POST;

    // フォームデータをJSON形式に変換してローカルストレージに保存
    echo "<script>";
    echo "localStorage.setItem('formData', '" . json_encode($formData) . "');";
    echo "</script>";

    // 保存後の処理などを実行
    // ...

    // 他の処理が完了したらリダイレクトするなどの方法で次のページに移動
    echo "<script>window.location.href = 'nextpage.php';</script>";
    exit;
}
?>

<form action="write.php" method="post" class="form" id="myForm">
    <ol class="side">
        <?php for ($i = 1; $i <= 5; $i++) { ?>
            <li>
                <input id="place<?php echo $i; ?>" name="place<?php echo $i; ?>" type="text" placeholder="物件名">
                <textarea id="address<?php echo $i; ?>" name="address<?php echo $i; ?>" placeholder="住所"></textarea>
                <select name="color<?php echo $i; ?>" id="color<?php echo $i; ?>">
                    <option value="">--物件の種類--</option>
                    <option value="#ff0000">住宅</option>
                    <option value="#008000">飲食店</option>
                    <option value="#0000ff">娯楽施設</option>
                    <option value="#ffff00">仕事</option>
                    <option value="#ffa500">その他</option>
                </select>
            </li>
        <?php } ?>
    </ol>

    <input type="submit" value="保存する"/>
</form>

<button id="check" style="margin: 0 auto; display: flex; margin-top: 50px;">地図に表示</button>

<div id="myMap" style="width:800px; height:600px; margin: 0 auto;"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=####' async defer></script>
<script src="./js/BmapQuery.js"></script>
<script>
    // フォームの送信イベントをキャプチャ
    document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault(); // フォームの通常の送信をキャンセル

        // フォームデータをオブジェクトに格納
        var formData = {};
        for (var i = 1; i <= 5; i++) {
            var place = document.getElementById('place' + i).value;
            var address = document.getElementById('address' + i).value;
            var color = document.getElementById('color' + i).value;

            // 2番目以降のフォームが空欄の場合は送信をキャンセル
            if (i >= 2 && (place === '' || address === '' || color === '')) {
                break; // ループを終了
            }

            formData['place' + i] = place;
            formData['address' + i] = address;
            formData['color' + i] = color;
        }

        // ローカルストレージにフォームデータを保存
        localStorage.setItem('formData', JSON.stringify(formData));

        // フォームを送信
        this.submit();
    });

    // ページの読み込み時に保存されたデータをフォームに表示
    document.addEventListener('DOMContentLoaded', function() {
        var storedData = JSON.parse(localStorage.getItem('formData'));
        if (storedData) {
            for (var i = 1; i <= 5; i++) {
                document.getElementById('place' + i).value = storedData['place' + i] || '';
                document.getElementById('address' + i).value = storedData['address' + i] || '';
                document.getElementById('color' + i).value = storedData['color' + i] || '';
            }
        }
    });

    function loadMapScenario() {
    var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
        /* No need to set credentials if already passed in URL */
        center: new Microsoft.Maps.Location(43.07166, 141.31392),
        zoom: 12
    });

    Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
        $('#check').click(function (event) {
            event.preventDefault();

            var storedData = JSON.parse(localStorage.getItem('formData'));
            if (storedData) {
                for (let i = 1; i <= 5; i++) {
                    const place = storedData['place' + i];
                    const address = storedData['address' + i];
                    const color = storedData['color' + i];

                    if (address !== '') {
                        var searchManager = new Microsoft.Maps.Search.SearchManager(map);
                        var requestOptions = {
                            bounds: map.getBounds(),
                            where: address,
                            callback: function (answer, userData) {
                                var location = answer.results[0].location;

                                var pinOptions = {
                                    title: place,
                                    color: color,
                                };

                                var pin = new Microsoft.Maps.Pushpin(location, pinOptions);
                                map.entities.push(pin);
                            }
                        };
                        searchManager.geocode(requestOptions);
                    }
                }
            }
        });
    });
}

</script>


