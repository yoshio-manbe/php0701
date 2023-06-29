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

<form action="write_s.php" method="post" class="form" id="myForm">
    <ol class="side">
        <?php for ($i = 1; $i <= 5; $i++) { ?>
            <li>
                <input id="name<?php echo $i; ?>" name="name<?php echo $i; ?>" type="text" placeholder="祭りの名前">
                <textarea id="state<?php echo $i; ?>" name="state<?php echo $i; ?>" placeholder="都道府県"></textarea>
                <textarea id="address<?php echo $i; ?>" name="address<?php echo $i; ?>" placeholder="住所"></textarea>
                <textarea id="month<?php echo $i; ?>" name="month<?php echo $i; ?>" placeholder="開催月"></textarea>
                <textarea id="date<?php echo $i; ?>" name="date<?php echo $i; ?>" placeholder="開催日"></textarea>
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
        var formData_f = {};
        for (var i = 1; i <= 5; i++) {
            var name = document.getElementById('name' + i).value;
            var state = document.getElementById('state' + i).value;
            var month = document.getElementById('month' + i).value;
            var address = document.getElementById('address' + i).value;
            var date = document.getElementById('date' + i).value;

            formData_f['name' + i] = name;
            formData_f['state' + i] = state;
            formData_f['month' + i] = month;
            formData_f['address' + i] = address;
            formData_f['date' + i] = date;
        }

        // ローカルストレージにフォームデータを保存
        localStorage.setItem('formData_f', JSON.stringify(formData_f));

        // フォームを送信
        this.submit();
    });

    // ページの読み込み時に保存されたデータをフォームに表示
    document.addEventListener('DOMContentLoaded', function() {
        var storedData_f = JSON.parse(localStorage.getItem('formData_f'));
        if (storedData_f) {
            for (var i = 1; i <= 5; i++) {
                document.getElementById('name' + i).value = storedData_f['name' + i] || '';
                document.getElementById('state' + i).value = storedData_f['state' + i] || '';
                document.getElementById('month' + i).value = storedData_f['month' + i] || '';
                document.getElementById('address' + i).value = storedData_f['address' + i] || '';
                document.getElementById('date' + i).value = storedData_f['date' + i] || '';
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

            var storedData_f = JSON.parse(localStorage.getItem('formData_f'));
            if (storedData_f) {
                for (let i = 1; i <= 5; i++) {
                    const name = storedData_f['name' + i];
                    const state = storedData_f['state' + i];
                    const month = storedData_f['month' + i];
                    const address = storedData_f['address' + i];
                    const date = storedData_f['date' + i];

                    if (address !== '') {
                        var searchManager = new Microsoft.Maps.Search.SearchManager(map);
                        var requestOptions = {
                            bounds: map.getBounds(),
                            where: address,
                            callback: function (answer, userData) {
                                var location = answer.results[0].location;

                                var pinOptions = {
                                    title: name,
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

<style>
    form{
        display: none;
    }
</style>

