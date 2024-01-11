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
    <link rel="stylesheet" href="css/map.css">
    <!-- Open Street Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <title>Login Form</title>
    
</head>


<body>

<main>
<div class="board__header">
    <div class="border__word-block">
        <h1 class="board__tittle">DBMS_NearParkingLot</h1>
    </div>
    <div class="board__btn-block">
        <!-- <a class="board__btn" href="register.php">Sign up</a> -->
        <a class="board__btn" href="login.php">Log in</a>
        <a class="board__btn" href="require_api.php">insert</a>
        <a class="board__btn" href="update_dy.php">update</a>
        
    </div>

</div>

<div class="board__content"> 

<!-- <div class="board__map"></div> -->
<div class="board__nevigator">
    <div class="board__btn-block">
        <!-- <a class="board__btn" href="register.php">找即時</a>
        <a class="board__btn" href="login.php">找充電</a>
        <a class="board__btn" href="login.php">找月租</a>
        <a class="board__btn" href="login.php">找其他</a> -->
    </div>

</div>
<div class="board__inline">
<form id="myForm">
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
        

        <h3><b>輸入篩選條件</b></h3>
        <div class="table" width="800" style="color: blue;">
            <table>
                <tbody>
                    <tr>
                        <td  rowspan="2" background-color:>輸入經緯度</td>
                        <td>經度</td>
                        <td class="options-container">
                            <input type="text" id="long" name="long" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>緯度</td>
                        <td class="options-container">    
                            <input type="text" id="lat" name="lat" value="">
                        </td>
                    </tr>
                    
                    <!--停車場資訊-->
                    <tr>
                        <td  rowspan="2" background-color:>停車場資訊</td>
                        <td>停車場類型</td>
                        <td class="options-container">
                            <label><input type="radio" name="parkingcharacter" value="option1">不限</label>
                            <input type="radio" name="parkingcharacter" value="option2">平面
                            <input type="radio" name="parkingcharacter" value="option3">立體
                            <input type="radio" name="parkingcharacter" value="option4">地下
                        </td>
                    </tr>
                    <tr>
                        <td>停車位類型</td>
                        <td class="options-container">
                        <label><input type="radio" name="parkingtype" value="option1">不限</label>
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
                            <label><input type="radio" name="frequency" value="option1">不限</label>
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
        <!-- <input type="submit" value = "查詢"> -->
        <button type="button" onclick="submitForm()">Submit</button>
        <!-- <button type="button" onclick="handleFormSubmission()">Submit</button> -->
    </div>
</form>

<div class='board__body'></div>
</div>
<!-- <div class="board__hr"></div>

<div class="board_map"> 
    <div id="map" style="height: 400px;"></div>
</div> -->
<!-- < ?php $result = require_once("connect.php"); ?> -->
<!-- < ?php require_once("content.php"); ?> -->
<!-- 
<div class="board__hr"></div>
<div class="board_list"></div> -->


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

</div>



</main>
<!-- <script>
    
    window.onload = function(){
        addMap();
        getLocation();
        map = initMap();
    }; 
</script> -->
<script src="mapfunc.js"></script>
<script src="locate.js"></script>

</body>
</html>
