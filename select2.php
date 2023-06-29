<div class="title">
    <select name="state" id="state">
        <option value="">--地域を選択--</option>
        <option value="hokka">北海道</option>
        <option value="tou">東北</option>
        <option value="kan">関東</option>
        <option value="hoku">北陸</option>
        <option value="chubu">中部</option>
    </select>

    <select name="month" id="month">
        <option value="">--月を選択--</option>
        <option value="july">7月</option>
        <option value="august">8月</option>
    </select>

    <button id="choice">祭りを確認</button>
</div>


<div id="result"></div>

<script>
    document.getElementById("choice").addEventListener("click", function() {
        var selectedState = document.getElementById("state").value;
        var selectedMonth = document.getElementById("month").value;

        if (selectedState === "hokka" && selectedMonth === "july") {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fes1.php?", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else if (selectedState === "tou" && selectedMonth === "august") {
            console.log("東北の8月の祭りを確認します");
        } else if (selectedState === "kan" && selectedMonth === "august") {
            console.log("関東の8月の祭りを確認します");
        } else if (selectedState === "hoku" && selectedMonth === "august") {
            console.log("北陸の8月の祭りを確認します");
        } else if (selectedState === "chubu" && selectedMonth === "august") {
            console.log("中部の8月の祭りを確認します");
        } else {
            console.log("選択された条件に該当する祭りはありません");
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
