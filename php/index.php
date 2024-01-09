<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/nevigator.css">

    <!-- Open Street Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <title>Login Form</title>
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
        carParkIdHeading.textContent = 'CarParkID: ' + row['CarParkName_Zh_tw'];

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
    // function handleFormSubmission() {
    //     submitForm()
    //         .then(result => {
    //             // Handle the result
    //             // var mapDiv = document.getElementById('map');
    //             // mapDiv.parentNode.removeChild(mapDiv);

    //             // // Create a new map div
    //             // var newMapDiv = document.createElement('div');
    //             // newMapDiv.id = 'map';
    //             // document.body.appendChild(newMapDiv);

    //             // // Reset markers array
    //             // markers = [];
    //             console.log('Submission successful:', result);
    //         })
    //         .catch(error => {
    //             // Handle the error
    //             console.error('Submission failed:', error);
    //         });
    // }


    function initMap(jsonData) {
        var initialCoords = jsonData.length > 0 ? jsonData[0] : { PositionLat: 0, PositionLon: 0 };
        map = null;
        // Initialize the map using Leaflet and OpenStreetMap
        map = L.map('map').setView([initialCoords.PositionLat, initialCoords.PositionLon], 18);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Add markers for each set of coordinates in the jsonData
        jsonData.forEach(function (data) {
            var marker = L.marker([data.PositionLat, data.PositionLon]).addTo(map);
            markers.push(marker);
        });

        newMap = map;

        return map;
    }
    // function initMap() {
    //     navigator.geolocation.watchPosition((position) => {
    //         console.log(position.coords);
    //         lat = position.coords.latitude;
    //         lng = position.coords.longitude;
            
    //         console.log(lat);
    //         console.log(lng);
    //         // Initialize the map using Leaflet and OpenStreetMap
    //         map = L.map('map').setView([lat, lng], 18);
    //         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //             attribution: '© OpenStreetMap contributors'
    //         }).addTo(map);

    //         // Add a marker to the map
    //         marker = L.marker([lat, lng]).addTo(map);
    //         newMap = map;
    //         return map;
    //     });
    // }
</script>
</head>


<body>
<main>
<div class="board__header">
    <div class="border__word-block">
        <h1 class="board__tittle">DBMS_NearParkingLot</h1>
    </div>
    <div class="board__btn-block">
        <a class="board__btn" href="register.php">Sign up</a>
        <a class="board__btn" href="login.php">Log in</a>
        
    </div>

</div>

<div class="board__content"> 

<!-- <div class="board__map"></div> -->
<div class="board__nevigator">
    <div class="board__btn-block">
        <a class="board__btn" href="register.php">找即時</a>
        <a class="board__btn" href="login.php">找充電</a>
        <a class="board__btn" href="login.php">找月租</a>
        <a class="board__btn" href="login.php">找其他</a>
    </div>

</div>

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
        <!-- <button type="button" onclick="handleFormSubmission()">Submit</button> -->
    </div>
</form>
<div id="map" style="height: 400px;"></div>

    <!-- init Map -->
    <script>
        // var map, marker, lat, lng, newMap;
        // newMap = initMap();

        // if (newMap === null) {
        //     initMap();
        // }
        // else{
        newMap.addTo(L.map('differentDiv'));
        // }
        
    </script>

<div class="board__hr"></div>


<script>

</script>
<!-- <?php $result = require_once("connect.phps"); ?> -->
<!-- <?php require_once("content.phps"); ?> -->

<div class="board__hr"></div>

<?php 

// require_once("connect.php"); 
// for ($i = 0; $row = $result->fetch_assoc(); $i++) {
//     // Print or use the data as needed
//     echo "Row $i: ";
//     print_r($row); // You can use print_r, var_dump, or any other method to display the data
//     echo "<br>";
// }

?>

<div class="board__hr"></div>

<!-- map + list -->
</div>



</main>
</body>
</html>
