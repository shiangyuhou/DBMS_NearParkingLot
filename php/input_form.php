<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="此網站能讓你快速查詢周圍的停車場及剩餘的停車位" />
    <meta name="author" content="Curiouslin" />
    <meta name="keywords" content="停車場位置,停車位,停車場條件篩選" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>停車位查詢系統</title>
    <link rel="stylesheet" href="basic.css"/>
    <script>
    function submitForm() {
        // Get all checked checkboxes
        var checkboxes = document.querySelectorAll('#myForm input[type="checkbox"]:checked');

        // Create a FormData object to store the form data
        var formData = new FormData();

        // Loop through checked checkboxes and append them to the FormData object
        checkboxes.forEach(function(checkbox) {
            formData.append(checkbox.name, checkbox.value);
        });

        // Use the Fetch API to make a POST request
        fetch('query.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(jsonData => {
            console.log(jsonData);
            // Handle the response as needed
            // document.getElementById('jsonDisplay').innerText = JSON.stringify(jsonData, null, 2);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
</head>

<!-- <form action = "query.php" method = "POST"> -->
    
    <body>
    <form id="myForm">
    <div>
        <h1><b>停車位查詢系統</b></h1>
        <br/>
        <h3><b>輸入所在地</b></h3>
        <label for="district">選擇行政區：</label>
        <select id="district" onchange="populateTownships()">
            <option value="" selected disabled>請選擇行政區</option>
            <!-- 行政區選項由 JavaScript 動態生成 -->
        </select>

        <label for="township">選擇鄉鎮市區：</label>
        <select id="township">
            <option value="" selected disabled>請先選擇行政區</option>
            <!-- 鄉鎮市區選項由 JavaScript 動態生成 -->
        </select>

        <h3><b>輸入日期與時間</b></h3>
        <input type="datetime-local" name = "datetime">

        <h3><b>輸入篩選條件</b></h3>
        <div class="table" width="800" style="color: blue;">
            <table>
                <tbody>
                    <!--停車場資訊-->
                    <tr>
                        <td  rowspan="2" background-color:>停車場資訊</td>
                        <td>停車場類型</td>
                        <td class="options-container">
                            <input type="radio" name="parkingcharacter" value="option1">不限
                            <input type="radio" name="parkingcharacter" value="option2">平面
                            <input type="radio" name="parkingcharacter" value="option3">立體
                            <input type="radio" name="parkingcharacter" value="option4">地下
                        </td>
                    </tr>
                    <tr>
                        <td>停車位類型</td>
                        <td class="options-container">
                        <input type="radio" name="parkingtype" value="option1">不限
                        <input type="radio" name="parkingtype" value="option2">機車
                        <input type="radio" name="parkingtype" value="option3">小客車
                        <input type="radio" name="parkingtype" value="option4">大客車
                        <input type="radio" name="parkingtype" value="option5">其他
                        </td>
                    </tr>
                    <!--收費方式-->
                    <tr>
                        <td rowspan="1">收費方式</td>
                        <td>支付計算方式</td>
                        <td class="options-container">
                            <input type="radio" name="frequency" value="option1">不限
                            <input type="radio" name="frequency" value="option2">非營業期間免費
                            <input type="radio" name="frequency" value="option3">可月租
                            <input type="radio" name="frequency" value="option4">可季租
                            <input type="radio" name="frequency" value="option5">可預訂
                        </td>
                    </tr>
                    <!--Safety-->
                    <tr>
                        <td rowspan="1">安全防護</td>
                        <td>安全設備</td>
                        <td class="options-container">
                            <input type="checkbox" name="safety[]" value="option1">警衛留守
                            <input type="checkbox" name="safety[]" value="option2">監視系統
                            <input type="checkbox" name="safety[]" value="option3">安全保障
                            <input type="checkbox" name="safety[]" value="option4">門控
                        </td>
                    </tr>
                    <!--服務資訊-->
                    <tr>
                        <td rowspan="2">服務資訊</td>
                        <td>設施</td>
                        <td class="options-container">
                        <input type="checkbox" name="facility[]" value="option1">廁所
                        <input type="checkbox" name="facility[]" value="option2">餐廳
                        <input type="checkbox" name="facility[]" value="option3">無障礙設施
                        <input type="checkbox" name="facility[]" value="option4">加油站
                        <input type="checkbox" name="facility[]" value="option5">電動車充電樁
                        <input type="checkbox" name="facility[]" value="option6">繳費機
                        <input type="checkbox" name="facility[]" value="option7">商店
                        <input type="checkbox" name="facility[]" value="option8">售票處
                        </td>
                    </tr>
                    <tr>
                        <td>即時剩餘車位查詢系統</td>
                        <td class="options-container">
                        <input type="radio" name="immediatesearch" value="option1">有
                        <input type="radio" name="immediatesearch" value="option2">無
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            
        </div>
        <input type="submit" value = "查詢">
        <button type="button" onclick="submitForm()">Submit</button>
    </div>
</form>
    <script>
       var districtData = [
            {
                name: "臺北市",
                townships: ["中正區", "大同區", "中山區", "松山區", "大安區"]
            },
            {
                name: "新北市",
                townships: ["板橋區", "新莊區", "中和區", "永和區", "三重區"]
            },
            // 其他行政區及鄉鎮市區
        ];

        var districtSelect = document.getElementById("district");
        var townshipSelect = document.getElementById("township");

        // 初始化行政區下拉選單
        districtData.forEach(function(district) {
            var option = document.createElement("option");
            option.value = district.name;
            option.text = district.name;
            districtSelect.add(option);
        });

        function populateTownships() {
            // 清空鄉鎮市區下拉選單
            townshipSelect.innerHTML = '<option value="" selected disabled>請選擇鄉鎮市區</option>';

            // 獲取選擇的行政區
            var selectedDistrict = districtSelect.value;

            // 查找該行政區的鄉鎮市區資料
            var selectedDistrictData = districtData.find(function(district) {
                return district.name === selectedDistrict;
            });

            // 動態生成鄉鎮市區選項
            if (selectedDistrictData) {
                selectedDistrictData.townships.forEach(function(township) {
                    var option = document.createElement("option");
                    option.value = township;
                    option.text = township;
                    townshipSelect.add(option);
                });
            }
        } 
    </script>
</body>
<!-- </form> -->
</html>