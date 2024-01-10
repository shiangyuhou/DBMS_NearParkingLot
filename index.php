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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
    /* Define initial styles */
    #demo {
      font-family: Arial, sans-serif;
      font-size: 16px;
    }
  </style>
  <script>

  </script>
</head>

<form action = "query.php" method = "POST">
<body>

    <div>
        <h1><b>停車位查詢系統</b></h1>
        <br/>
        <h3><b>輸入所在地</b></h3>
        <label for="district">選擇行政區：</label>
        <select name = "zone">
            <option value= "基隆市" >基隆市</option>
            <option value= "臺北市" >臺北市</option>
            <option value= "桃園市" >桃園市</option>
            <option value= "新竹市" >新竹市</option>
            <option value= "苗栗縣" >苗栗縣</option>
            <option value= "臺中市" >臺中市</option>
            <option value= "南投縣" >南投縣</option>
            <option value= "嘉義縣" >嘉義縣</option>
            <option value= "嘉義市" >嘉義市</option>
            <option value= "臺南市" >臺南市</option>
            <option value= "高雄市" >高雄市</option>
            <option value= "屏東縣" >屏東縣</option>
            <option value= "臺東縣" >臺東縣</option>
            <option value= "花蓮縣" >花蓮縣</option>
            <option value= "宜蘭縣" >宜蘭縣</option>
            <option value= "金門縣" >金門縣</option>
            <option value= "連江縣" >連江縣</option>
        </select>

        <h3><b>輸入日期與時間</b></h3>
        <input type="date" name = "datetime">
        
        <h3><b>使用者參考位置(GPS)</b></h3>
        <p id="demo"></p>
        <script>
            var lo, la;
            var x = document.getElementById("demo");
    
            function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "該瀏覽器不支援獲取地理位置。";
            }
            }
    
            function showPosition(position) {
            x.innerHTML = "經度: " + position.coords.longitude + "<br>緯度: " + position.coords.latitude;
            lo=string(position.coords.longitude);
            la=string(position.coords.latitude);

      
            // Manipulate CSS based on the obtained geolocation
            x.style.color = "blue"; // Change text color to blue
            x.style.fontWeight = "bold"; // Make the text bold
            // Add more CSS properties as needed
            }

            window.onload = function(){
                getLocation();
            };
        </script>

        <!-- Button to trigger geolocation -->

        <h3><b>輸入篩選條件</b></h3>
        <div class="table" width="800" style="color: blue;">
            <table>
                <tbody>
                    <tr>
                        <td  rowspan="2" background-color:>輸入經緯度</td>
                        <td>經度</td>
                        <td class="options-container">
                            <input type="text" name="long" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>緯度</td>
                        <td class="options-container">    
                            <input type="text" name="lat">
                        </td>
                    </tr>
                    <script>
                        document.getElementById("long").value = lo;
                        document.getElementById("lat").value = la;
                    </script>
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
                        <input type="radio" name="immediatesearch" value="option1">不限
                        <input type="radio" name="immediatesearch" value="option2">有
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            
        </div>
        <button type="submit" onclick="submitForm()">查詢</button>

    </div>
    <div id="map" style="height: 400px;"></div>

    <!-- init Map -->
    <script>
    var map, marker, lat, lng, newMap, result_json;
    var markers = [];

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
            newMap = initMap(jsonData);
            result_json = jsonData;
            generateCards(result_json);

            // return jsonData;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    function initMap() {
        navigator.geolocation.watchPosition((position) => {
            console.log(position.coords);
            lat = position.coords.latitude;
            lng = position.coords.longitude;
           
            console.log(lat);
            console.log(lng);
            // Initialize the map using Leaflet and OpenStreetMap
            map = L.map('map').setView([lat, lng], 18);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
             // Add a marker to the map
            marker = L.marker([lat, lng]).addTo(map);
            newMap = map;
            return map;
        });
     }

        newMap = initMap();

        if (newMap === null) {
            initMap();
        }
        else{
        newMap.addTo(L.map('differentDiv'));
        }
    function generateCards(data) {
    console.log(data);
    // Assuming 'data' is an array of objects with the same structure as your PHP $result
    data.forEach(function (row) {
        var boardHr = document.createElement('div');
        boardHr.classList.add('board__hr');

        var card = document.createElement('div');
        card.classList.add('card');

        var cardAvatar = document.createElement('div');
        cardAvatar.classList.add('card__avatar');

        var cardBody = document.createElement('div');
        cardBody.classList.add('card__body');

        var cardInfo = document.createElement('div');
        cardInfo.classList.add('card__info');

        var cardContent = document.createElement('p');
        cardContent.classList.add('card__content');

        var carParkIdHeading = document.createElement('h2');
        carParkIdHeading.textContent = row['CarParkName_Zh_tw'] + ",    地址:    " + row['Address'] + ",    收費方式:    " + row['PaymentDescription'];

        var cardContent2 = document.createElement('p');
        cardContent2.classList.add('card__content');

        // Append elements to the body
        cardBody.appendChild(cardInfo);
        cardBody.appendChild(cardContent);
        cardBody.appendChild(carParkIdHeading);
        cardBody.appendChild(cardContent2);

        card.appendChild(cardAvatar);
        card.appendChild(cardBody);

        // Append the elements to the document or a container element
        document.body.appendChild(boardHr);
        document.body.appendChild(card);
        });
    }
        
    </script>

</body>
</form>
</html>