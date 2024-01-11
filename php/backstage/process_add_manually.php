<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <style>
        /* 隱藏類別 */
        .hidden {
            display: none;
        }
    </style>
    
</head>
<body>
<?php
$conn=require_once("../connect.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
            
        // 從資料庫中獲取項目列表
        $sqlCity = "SELECT distinct City, CityCode FROM CarParks";
        $resultCity = $conn->query($sqlCity);

        // 存放項目的陣列
        $items = [];

        if ($resultCity->num_rows > 0) {
            while ($Cityrow = $resultCity->fetch_assoc()) {
                $itemCity = $Cityrow["City"];
                $itemCityCode = $Cityrow["CityCode"];
                // 根據每個 id 指定替代值
                switch ($itemCity) {
                    case 'ChiayiCounty':
                        $replacementValue = '嘉義縣';
                        break;
                    case 'Taipei':
                        $replacementValue = '台北市';
                        break;
                    case 'Taichung':
                        $replacementValue = '台中市';
                        break;
                    case 'Kaohsiung':
                        $replacementValue = '高雄市';
                        break;
                    case 'YilanCounty':
                        $replacementValue = '宜蘭縣';
                        break;
                    case 'Chiayi':
                        $replacementValue = '嘉義市';
                        break;
                    case 'Tainan':
                        $replacementValue = '台南市';
                        break;
                    case 'Hsinchu':
                        $replacementValue = '新竹市';
                        break;
                    case 'HualienCounty':
                        $replacementValue = '花蓮縣';
                        break;
                    case 'Taoyuan':
                        $replacementValue = '桃園市';
                        break;
                    case 'NantouCounty':
                        $replacementValue = '南投縣';
                        break;
                    case 'Keelung':
                        $replacementValue = '基隆市';
                        break;
                    case 'KinmenCounty':
                        $replacementValue = '金門縣';
                        break;
                    case 'LienchiangCounty':
                        $replacementValue = '連江縣';
                        break;
                    case 'MiaoliCounty':
                        $replacementValue = '苗栗縣';
                        break;
                    case 'PingtungCounty':
                        $replacementValue = '屏東縣';
                        break;
                    case 'TaitungCounty':
                        $replacementValue = '台東縣';
                        break;
                    // 可以根據需求添加其他 id 對應的情況
                    default:
                        $replacementValue = $itemCityCode;
                }

                // 將每個 id 和其對應的替代值存入陣列
                $items[] = [
                    'City' => $itemCity,
                    'CityCode' => $itemCityCode,
                    'replacementValue' => $replacementValue,
                ];
            }
        }

        ?>
        <form action="add_manually.php" method="post">
        <h3>停車場基本資料</h3>   
        <label for="CarParkID">停車場ID:</label>
        <input type="text" id="CarParkID" style="display: block;" name="CarParkID"  required>
                    
        <label for="CarParkName_Zh_tw">停車場名稱:</label>
        <input type="text" id="CarParkName_Zh_tw" style="display: block;" name="CarParkName_Zh_tw" required>

        <label for="OperatorID">營運業者ID:</label>
        <input type="text" id="OperatorID" style="display: block;" name="OperatorID"  >
                
        <label for="Description">停車場敘述:</label>
        <input type="text" id="Description" style="display: block;" name="Description" >

        <label for="CarParkType">停車場類型:</label><br>
            <input type="radio" name="CarParkType" value="1" > 平面
            <input type="radio" name="CarParkType" value="2" > 立體
            <input type="radio" name="CarParkType" value="3" > 地下
            <input type="radio" name="CarParkType" value="4" > 立體停車塔
            <input type="radio" name="CarParkType" value="5" > 立體機械式
            <input type="radio" name="CarParkType" value="6" > 同時涵蓋 2 種以上
            <input type="radio" name="CarParkType" value="254" > 其他
            <input type="radio" name="CarParkType" value="255" > 未知
            <br>

        <label for="ParkingGuideType">停車導引類型:</label><br>
            
            <input type="radio" name="ParkingGuideType" value="1" > 自行找尋停車位
            <input type="radio" name="ParkingGuideType" value="2" > 有導引輔助設施協助尋找停車位
            <input type="radio" name="ParkingGuideType" value="3" > 人工導引停找車位
            <input type="radio" name="ParkingGuideType" value="4" > 代客泊車
            <input type="radio" name="ParkingGuideType" value="5" > 混合型
            <input type="radio" name="ParkingGuideType" value="254" > 其他
            <input type="radio" name="ParkingGuideType" value="255" > 未知
            <br>

        <label for="CarParkPosition_PositionLat">位置緯度:</label>
            <input type="number" name="CarParkPosition_PositionLat" id="CarParkPosition_PositionLat" >
            <br>

        <label for="CarParkPosition_PositionLon">位置經度:</label>
            <input type="number" name="CarParkPosition_PositionLon" id="CarParkPosition_PositionLon" >
            <br>

        <label for="Address">停車場地址:</label><br>
            <input type="text" id="Address" style="display: block;" name="Address" >

        <label for="FareDescription">票價資訊文字描述:</label><br>
            <input type="text" id="FareDescription" style="display: block;" name="FareDescription" >

        <label for="IsFreeParkingOutOfHours">是否在營業時間外不收費:</label><br>
            <input type="radio" name="IsFreeParkingOutOfHours" value="0" > 否
            <input type="radio" name="IsFreeParkingOutOfHours" value="1" > 是
            <br>
        
        <label for="IsMotorcycle">機車停車場 :</label><br>
            <input type="radio" name="IsMotorcycle" value="0" > 否
            <input type="radio" name="IsMotorcycle" value="1" > 是
            <br>
        
        <label for="IsPublic">是否為公有停車場 :</label><br>
            <input type="radio" name="IsPublic" value="0" > 否
            <input type="radio" name="IsPublic" value="1" > 是
            <br>

        <label for="OperationType">營運種類 :</label><br>
            <input type="radio" name="OperationType" value="1" > 公辦民營
            <input type="radio" name="OperationType" value="2" > 公辦公營
            <input type="radio" name="OperationType" value="3" > 私有民營
            <br>
        
        <label for="LiveOccuppancyAvailable">動態剩餘車位資訊:</label><br>
            <input type="radio" name="LiveOccuppancyAvailable" value="0" > 無
            <input type="radio" name="LiveOccuppancyAvailable" value="1" > 有
            <br>
        <label for="EVRechargingAvailable">電動車充電設施:</label><br>
            <input type="radio" name="EVRechargingAvailable" value="0" > 無
            <input type="radio" name="EVRechargingAvailable" value="1" > 有
            <br>
        <label for="MonthlyTicketAvailable">月租:</label><br>
            <input type="radio" name="MonthlyTicketAvailable" value="0" > 無
            <input type="radio" name="MonthlyTicketAvailable" value="1" > 有
            <br>
        <label for="SeasonTicketAvailable">季租:</label><br>
            <input type="radio" name="SeasonTicketAvailable" value="0" > 無
            <input type="radio" name="SeasonTicketAvailable" value="1" > 有
            <br>
        <label for="ReservationAvailable">預約車位:</label><br>
            <input type="radio" name="ReservationAvailable" value="0" > 無
            <input type="radio" name="ReservationAvailable" value="1" > 有
            <br>
        <label for="WheelchairAccessible">無障礙設施:</label><br>
            <input type="radio" name="WheelchairAccessible" value="0" > 無
            <input type="radio" name="WheelchairAccessible" value="1" > 有
            <br>
        <label for="OvernightPermitted">允許停車過夜:</label><br>
            <input type="radio" name="OvernightPermitted" value="0" > 不行
            <input type="radio" name="OvernightPermitted" value="1" > 可以
            <br>

        <label for="TicketMachine">是否有自動售票機:</label><br>
            <input type="radio" name="TicketMachine" value="0" > 不行
            <input type="radio" name="TicketMachine" value="1" > 可以
            <br>

        <label for="Toilet">廁所:</label><br>
            <input type="radio" name="Toilet" value="0" > 無
            <input type="radio" name="Toilet" value="1" > 有
            <br>
        <label for="Restaurant">餐廳:</label><br>
            <input type="radio" name="Restaurant" value="0" > 無
            <input type="radio" name="Restaurant" value="1" > 有
            <br>
        <label for="GasStation">加油站:</label><br>
            <input type="radio" name="GasStation" value="0" > 無
            <input type="radio" name="GasStation" value="1" > 有
            <br>
        <label for="Gated">商店:</label><br>
            <input type="radio" name="Gated" value="0" > 無
            <input type="radio" name="Gated" value="1" > 有
            <br>
        
        <label for="Shop">是否有閘口:</label><br>
            <input type="radio" name="Shop" value="0" > 無
            <input type="radio" name="Shop" value="1" > 有
            <br>
        
        <label for="Lighting">照明設施:</label><br>
            <input type="radio" name="Lighting" value="0" > 無
            <input type="radio" name="Lighting" value="1" > 有
            <br>
        <label for="SecureParking">停車安全保障:</label><br>
            <input type="radio" name="SecureParking" value="0" > 無
            <input type="radio" name="SecureParking" value="1" > 有
            <br>

        <label for="TicketOffice">是否有售票處 :</label><br>
            <input type="radio" name="TicketOffice" value="0" > 無
            <input type="radio" name="TicketOffice" value="1" > 有
            <br>

        <label for="ProhibitedForAnyHazardousMaterialLoads">是否允許於停車場區域內裝卸危險物品 :</label><br>
            <input type="radio" name="ProhibitedForAnyHazardousMaterialLoads" value="0" > 無
            <input type="radio" name="ProhibitedForAnyHazardousMaterialLoads" value="1" > 有
            <br>

        <label for="SecurityGuard">管理人員:</label><br>
            <input type="radio" name="SecurityGuard" value="0" > 無
            <input type="radio" name="SecurityGuard" value="1" > 有
            <br>
        <label for="Supervision">監視系統:</label><br>
            <input type="radio" name="Supervision" value="0" > 無
            <input type="radio" name="Supervision" value="1" > 有
            <br>

        <!--city & citycode-->
        <label for="City">城市名稱</label><br>
        <select id="City" name="City">
            <option value="" disabled selected>請選擇</option>
            <option value="ChiayiCounty">嘉義縣</option>
            <option value="Taipei">台北市</option>
            <option value="Taichung">台中市</option>
            <option value="Kaohsiung">高雄市</option>
            <option value="YilanCounty">宜蘭縣</option>
            <option value="Chiayi">嘉義市</option>
            <option value="Tainan">台南市</option>
            <option value="Hsinchu">新竹市</option>
            <option value="HualienCounty">花蓮縣</option>
            <option value="Taoyuan">桃園市</option>
            <option value="NantouCounty">南投縣</option>
            <option value="Keelung">基隆市</option>
            <option value="KinmenCounty">金門縣</option>
            <option value="LienchiangCounty">連江縣</option>
            <option value="MiaoliCounty">苗栗縣</option>
            <option value="PingtungCounty">屏東縣</option>
            <option value="TaitungCounty">台東縣</option>
        </select>
        <br>

        <label for="CityCode">城市代碼:</label><br>
        <input type="text" id="CityCode" name="CityCode" readonly><br>

        <h3>服務時間</h3> 
        <label for="ServiceDay_ServiceTag">服務適用日:</label>
        <input type="text" id="ServiceDay_ServiceTag" style="display: block;" name="ServiceDay_ServiceTag" >

        <label for="ServiceTimeDescription">服務時段:</label>
        <input type="text" id="ServiceTimeDescription" style="display: block;" name="ServiceTimeDescription" >

        <label for="ServiceDay">服務日期:</label><br>
            <input type="checkbox" name="ServiceDay_Monday" value="1" > 星期一
            <input type="checkbox" name="ServiceDay_Tuesday" value="1" > 星期二
            <input type="checkbox" name="ServiceDay_Wednesday" value="1" > 星期三
            <input type="checkbox" name="ServiceDay_Thursday" value="1" > 星期四
            <input type="checkbox" name="ServiceDay_Friday" value="1" > 星期五
            <input type="checkbox" name="ServiceDay_Saturday" value="1" > 星期六
            <input type="checkbox" name="ServiceDay_Sunday" value="1" > 星期日
            <input type="checkbox" name="ServiceDay_NationalHolidays" value="1" > 國定假日
            <br>

        <label for="StartTime">開始營業時間:</label><br>
        <input type="time" name="StartTime"  ><br>

        <label for="EndTime">結束營業時間:</label><br>
        <input type="time" name="EndTime"  ><br>

        <label for="FreeOfCharge">免費停車:</label><br>
            <input type="radio" name="FreeOfCharge" value="0" > 無
            <input type="radio" name="FreeOfCharge" value="1" > 有
            <br>

        <h3>停車場車位數資料</h3> 
        <label for="TotalSpaces">停車位總數:</label>
            <input type="number" name="TotalSpaces" id="TotalSpaces" >
            <br>

        <label for="SpaceType">停車位類型:</label><br>
            <input type="radio" id="SpaceType" name="SpaceType" value="0" > 所有停車位類型
            <input type="radio" id="SpaceType" name="SpaceType" value="1" > 自小客車
            <input type="radio" id="SpaceType" name="SpaceType" value="2" > 機車位
            <input type="radio" id="SpaceType" name="SpaceType" value="3" > 重型機車位
            <input type="radio" id="SpaceType" name="SpaceType" value="4" > 腳踏車位
            <input type="radio" id="SpaceType" name="SpaceType" value="5" > 大型車位
            <input type="radio" id="SpaceType" name="SpaceType" value="6" > 小型巴士位
            <input type="radio" id="SpaceType" name="SpaceType" value="7" > 孕婦及親子專用車位
            <input type="radio" id="SpaceType" name="SpaceType" value="8" > 婦女車位
            <input type="radio" id="SpaceType" name="SpaceType" value="9" > 身心障礙汽車車位
            <input type="radio" id="SpaceType" name="SpaceType" value="10" > 身心障礙機車車位
            <input type="radio" id="SpaceType" name="SpaceType" value="11" > 電動汽車車位
            <input type="radio" id="SpaceType" name="SpaceType" value="12" > 電動機車車位
            <input type="radio" id="SpaceType" name="SpaceType" value="13" > 復康巴士
            <input type="radio" id="SpaceType" name="SpaceType" value="14" > 月租機車位
            <input type="radio" id="SpaceType" name="SpaceType" value="15" > 月租汽車位
            <input type="radio" id="SpaceType" name="SpaceType" value="16" > 季租機車位
            <input type="radio" id="SpaceType" name="SpaceType" value="17" > 季租汽車位
            <input type="radio" id="SpaceType" name="SpaceType" value="18" > 半年租機車位
            <input type="radio" id="SpaceType" name="SpaceType" value="19" > 半年租汽車位
            <input type="radio" id="SpaceType" name="SpaceType" value="20" > 年租機車位
            <input type="radio" id="SpaceType" name="SpaceType" value="21" > 年租汽車位
            <input type="radio" id="SpaceType" name="SpaceType" value="22" > 租賃機車位
            <input type="radio" id="SpaceType" name="SpaceType" value="23" > 租賃汽車位
            <input type="radio" id="SpaceType" name="SpaceType" value="24" > 卸貨車位
            <input type="radio" id="SpaceType" name="SpaceType" value="25" > 計程車位
            <input type="radio" id="SpaceType" name="SpaceType" value="26" > 夜間安心停車
            <input type="radio" id="SpaceType" name="SpaceType" value="27" > 臨時停車
            <input type="radio" id="SpaceType" name="SpaceType" value="28" > 專用停車
            <input type="radio" id="SpaceType" name="SpaceType" value="29" > 預約停車
            <input type="radio" id="SpaceType" name="SpaceType" value="254" > 其他
            <input type="radio" id="SpaceType" name="SpaceType" value="255" > 未知
            <br>
        
        <label for="IsMechanical">是否為機械車位:</label><br>
            <input type="radio" id="IsMechanical" name="IsMechanical" value="0" > 否
            <input type="radio" id="IsMechanical" name="IsMechanical" value="1" > 是
            <br>

        <label for="HasChargingPoint">是否附屬充電樁:</label><br>
            <input type="radio" id="HasChargingPoint" name="HasChargingPoint" value="0" > 否
            <input type="radio" id="HasChargingPoint" name="HasChargingPoint" value="1" > 是
            <br>

        <label for="NumberOfSpaces">該停車位類型停車位數:</label><br>
            <input type="number" name="NumberOfSpaces" id="NumberOfSpaces" >
            <br>

        <label for="NumberOfSpaces">停車停留類型:</label><br>
            <input type="radio" id="StayType" name="StayType" value="1" > 臨停接送
            <input type="radio" id="StayType" name="StayType" value="2" > 短時間停車
            <input type="radio" id="StayType" name="StayType" value="3" > 長時間停車
            <input type="radio" id="StayType" name="StayType" value="4" > 無限制停放
            <input type="radio" id="StayType" name="StayType" value="5" > 租賃
            <input type="radio" id="StayType" name="StayType" value="254" > 其他
            <input type="radio" id="StayType" name="StayType" value="255" > 未知
            <br>

        

        <h3>收費方式</h3>
        <label for="HasInvoice">是否開立發票:</label><br>
        <input type="radio" id="HasInvoice" name="HasInvoice" value="1" > 是
        <input type="radio" id="HasInvoice" name="HasInvoice" value="0" > 否
        <br>
    
        <label for="InvoiceType_DuplicateUniform">二聯式發票:</label><br>
        <input type="radio" id="InvoiceType_DuplicateUniform" name="InvoiceType_DuplicateUniform" value="0"> 否
        <input type="radio" id="InvoiceType_DuplicateUniform" name="InvoiceType_DuplicateUniform" value="1"> 是
        <br>

        <label for="InvoiceType_TriplicateUniform">三聯式發票(含統編):</label><br>
        <input type="radio" id="InvoiceType_TriplicateUniform" name="InvoiceType_TriplicateUniform" value="0" > 否
        <input type="radio" id="InvoiceType_TriplicateUniform" name="InvoiceType_TriplicateUniform" value="1" > 是
        <br>
        
        <label for="InvoiceSupport_BANPrinted">是否能打統一編號:</label><br>
        <input type="radio" id="InvoiceSupport_BANPrinted" name="InvoiceSupport_BANPrinted" value="0" > 否
        <input type="radio" id="InvoiceSupport_BANPrinted" name="InvoiceSupport_BANPrinted" value="1" > 是
        <br>
        
        <label for="InvoiceSupport_Donation">是否支援愛心捐贈:</label><br>
        <input type="radio" id="InvoiceSupport_Donation" name="InvoiceSupport_Donation" value="0" > 否
        <input type="radio" id="InvoiceSupport_Donation" name="InvoiceSupport_Donation" value="1" > 是
        <br>

        <label for="HasEInvoice">是否開立電子發票:</label><br>
        <input type="radio" id="HasEInvoice" name="HasEInvoice" value="0" > 否
        <input type="radio" id="HasEInvoice" name="HasEInvoice" value="1" > 是
        <br>

        <label for="HasEInvoiceCarrier">電子發票是否提供載具:</label><br>
        <input type="radio" id="HasEInvoiceCarrier" name="HasEInvoiceCarrier" value="0" > 否
        <input type="radio" id="HasEInvoiceCarrier" name="HasEInvoiceCarrier" value="1" > 是
        <br>

        <label for="EInvoiceCarrierType_Generic">共通性載具:</label><br>
        <input type="radio" id="EInvoiceCarrierType_Generic" name="EInvoiceCarrierType_Generic" value="0" > 無
        <input type="radio" id="EInvoiceCarrierType_Generic" name="EInvoiceCarrierType_Generic" value="1" > 有
        <br>
        
        <label for="EInvoiceCarrierType_SmartCard">票證載具:</label><br>
        <input type="radio" id="EInvoiceCarrierType_SmartCard" name="EInvoiceCarrierType_SmartCard" value="0" > 無
        <input type="radio" id="EInvoiceCarrierType_SmartCard" name="EInvoiceCarrierType_SmartCard" value="1" > 有
        <br>

        <label for="EInvoiceCarrierType_CreditCard">信用卡載具:</label><br>
        <input type="radio" id="EInvoiceCarrierType_CreditCard" name="EInvoiceCarrierType_CreditCard" value="0" > 無
        <input type="radio" id="EInvoiceCarrierType_CreditCard" name="EInvoiceCarrierType_CreditCard" value="1" > 有
        <br>

        <label for="EInvoiceCarrierType_DebitCard">金融卡載具:</label><br>
        <input type="radio" id="EInvoiceCarrierType_DebitCard" name="EInvoiceCarrierType_DebitCard" value="0" > 無
        <input type="radio" id="EInvoiceCarrierType_DebitCard" name="EInvoiceCarrierType_DebitCard" value="1" > 有
        <br>

        <label for="EInvoiceCarrierType_MemberCard">會員卡載具:</label><br>
        <input type="radio" id="EInvoiceCarrierType_MemberCard" name="EInvoiceCarrierType_MemberCard" value="0" > 無
        <input type="radio" id="EInvoiceCarrierType_MemberCard" name="EInvoiceCarrierType_MemberCard" value="1" > 有
        <br>

        <label for="EInvoiceCarrierType_DonationCode">愛心捐贈代碼:</label><br>
        <input type="radio" id="EInvoiceCarrierType_DonationCode" name="EInvoiceCarrierType_DonationCode" value="0" > 無
        <input type="radio" id="EInvoiceCarrierType_DonationCode" name="EInvoiceCarrierType_DonationCode" value="1" > 有
        <br>

        <label for="PaymentProcess_PayAndDisplay">先付費再停車 :</label><br>
        <input type="radio" id="PaymentProcess_PayAndDisplay" name="PaymentProcess_PayAndDisplay" value="0" > 無
        <input type="radio" id="PaymentProcess_PayAndDisplay" name="PaymentProcess_PayAndDisplay" value="1" > 有
        <br>

        <label for="PaymentProcess_PayByPrepaidToken">先付費取得代幣後停車 :</label><br>
        <input type="radio" id="PaymentProcess_PayByPrepaidToken" name="PaymentProcess_PayByPrepaidToken" value="0" > 無
        <input type="radio" id="PaymentProcess_PayByPrepaidToken" name="PaymentProcess_PayByPrepaidToken" value="1" > 有
        <br>

        <label for="PaymentProcess_PayAtExitBoothManualCollection">出口收費亭人工收費 :</label><br>
        <input type="radio" id="PaymentProcess_PayAtExitBoothManualCollection" name="PaymentProcess_PayAtExitBoothManualCollection" value="0" > 無
        <input type="radio" id="PaymentProcess_PayAtExitBoothManualCollection" name="PaymentProcess_PayAtExitBoothManualCollection" value="1" > 有
        <br>

        <label for="PaymentProcess_PayAtMachineOnFootPriorToExit">離場前先於繳費機繳費 :</label><br>
        <input type="radio" id="PaymentProcess_PayAtMachineOnFootPriorToExit" name="PaymentProcess_PayAtMachineOnFootPriorToExit" value="0" > 無
        <input type="radio" id="PaymentProcess_PayAtMachineOnFootPriorToExit" name="PaymentProcess_PayAtMachineOnFootPriorToExit" value="1" > 有
        <br>

        <label for="PaymentProcess_PayBySmartCard">利用電子票證付費 :</label><br>
        <input type="radio" id="PaymentProcess_PayBySmartCard" name="PaymentProcess_PayBySmartCard" value="0" > 無
        <input type="radio" id="PaymentProcess_PayBySmartCard" name="PaymentProcess_PayBySmartCard" value="1" > 有
        <br>

        <label for="PaymentProcess_PayByMobile">利用手機行動裝置付費 :</label><br>
        <input type="radio" id="PaymentProcess_PayByMobile" name="PaymentProcess_PayByMobile" value="0" > 無
        <input type="radio" id="PaymentProcess_PayByMobile" name="PaymentProcess_PayByMobile" value="1" > 有
        <br>

        <label for="PaymentProcess_PayByEtag">利用eTag感應付費 :</label><br>
        <input type="radio" id="PaymentProcess_PayByEtag" name="PaymentProcess_PayByEtag" value="0" > 無
        <input type="radio" id="PaymentProcess_PayByEtag" name="PaymentProcess_PayByEtag" value="1" > 有
        <br>

        <label for="PaymentProcess_Others">其他付款方式 :</label><br>
        <input type="radio" id="PaymentProcess_Others" name="PaymentProcess_Others" value="0" > 無
        <input type="radio" id="PaymentProcess_Others" name="PaymentProcess_Others" value="1" > 有
        <br>

        <label for="PaymentMethod_Cash">現金:</label><br>
        <input type="radio" id="PaymentMethod_Cash" name="PaymentMethod_Cash" value="0" > 無
        <input type="radio" id="PaymentMethod_Cash" name="PaymentMethod_Cash" value="1" > 有
        <br>
        <label for="PaymentMethod_CreditCard">信用卡:</label><br>
        <input type="radio" id="PaymentMethod_CreditCard" name="PaymentMethod_CreditCard" value="0" > 無
        <input type="radio" id="PaymentMethod_CreditCard" name="PaymentMethod_CreditCard" value="1" > 有
        <br>

        <label for="PaymentMethod_SmartCard">電子票證:</label><br>
        <input type="radio" id="PaymentMethod_SmartCard" name="PaymentMethod_SmartCard" value="0" > 無
        <input type="radio" id="PaymentMethod_SmartCard" name="PaymentMethod_SmartCard" value="1" > 有
        <br>

        <label for="PaymentMethod_ETC">ETC 帳戶:</label><br>
        <input type="radio" id="PaymentMethod_ETC" name="PaymentMethod_ETC" value="0" > 無
        <input type="radio" id="PaymentMethod_ETC" name="PaymentMethod_ETC" value="1" > 有
        <br>

        <label for="PaymentMethod_MobilePayment">行動支付:</label><br>
        <input type="radio" id="PaymentMethod_MobilePayment" name="PaymentMethod_MobilePayment" value="0" > 無
        <input type="radio" id="PaymentMethod_MobilePayment" name="PaymentMethod_MobilePayment" value="1" > 有
        <br>

        <label for="PaymentMethod_Token">代幣:</label><br>
        <input type="radio" id="PaymentMethod_Token" name="PaymentMethod_Token" value="0" > 無
        <input type="radio" id="PaymentMethod_Token" name="PaymentMethod_Token" value="1" > 有
        <br>

        <label for="PaymentMethod_Others">其他付款方法 :</label><br>
        <input type="radio" id="PaymentMethod_Others" name="PaymentMethod_Others" value="0" > 無
        <input type="radio" id="PaymentMethod_Others" name="PaymentMethod_Others" value="1" > 有
        <br>

        <label for="SmartCard_EasyCard">悠遊卡:</label><br>
        <input type="radio" id="SmartCard_EasyCard" name="SmartCard_EasyCard" value="0" > 無
        <input type="radio" id="SmartCard_EasyCard" name="SmartCard_EasyCard" value="1" > 有
        <br>

        <label for="SmartCard_IPASS">一卡通:</label><br>
        <input type="radio" id="SmartCard_IPASS" name="SmartCard_IPASS" value="0" > 無
        <input type="radio" id="SmartCard_IPASS" name="SmartCard_IPASS" value="1" > 有
        <br>

        <label for="SmartCard_ICash">愛金卡:</label><br>
        <input type="radio" id="SmartCard_ICash" name="SmartCard_ICash" value="0" > 無
        <input type="radio" id="SmartCard_ICash" name="SmartCard_ICash" value="1" > 有
        <br>

        <label for="SmartCard_HappyCash">有錢卡:</label><br>
        <input type="radio" id="SmartCard_HappyCash" name="SmartCard_HappyCash" value="0" > 無
        <input type="radio" id="SmartCard_HappyCash" name="SmartCard_HappyCash" value="1" > 有
        <br>

        <label for="PaymentDescription">付款資訊文字描述:</label>
        <input type="text" id="PaymentDescription" style="display: block;" name="PaymentDescription" >

        <label for="HasTicketingMachine">自動繳費機:</label><br>
            <input type="radio" id="HasTicketingMachine" name="HasTicketingMachine" value="0" > 無
            <input type="radio" id="HasTicketingMachine" name="HasTicketingMachine" value="1" > 有
            <br>

        <label for="TicketingMachine_DisabledFriendly">自動繳費機對身心障礙人士操作介面高度是否友善:</label><br>
            <input type="radio" id="TicketingMachine_DisabledFriendly" name="TicketingMachine_DisabledFriendly" value="0" > 否
            <input type="radio" id="TicketingMachine_DisabledFriendly" name="TicketingMachine_DisabledFriendly" value="1" > 是
            <br>

        <label for="HasTicketingValidator">票證驗票設備:</label><br>
            <input type="radio" id="HasTicketingValidator" name="HasTicketingValidator" value="0" > 無
            <input type="radio" id="HasTicketingValidator" name="HasTicketingValidator" value="1" > 有
            <br>
        
        <label for="TicketingValidatorType_Contactless">非接觸式讀卡設備:</label><br>
            <input type="radio" id="TicketingValidatorType_Contactless" name="TicketingValidatorType_Contactless" value="0" > 否
            <input type="radio" id="TicketingValidatorType_Contactless" name="TicketingValidatorType_Contactless" value="1" > 是
            <br>

        <label for="TicketingValidatorType_Magnetic">磁票型驗票設備(接觸式):</label><br>
            <input type="radio" id="TicketingValidatorType_Magnetic" name="TicketingValidatorType_Magnetic" value="0" > 否
            <input type="radio" id="TicketingValidatorType_Magnetic" name="TicketingValidatorType_Magnetic" value="1" > 是
            <br>

        <label for="TicketingValidatorType_NFC">NFC型驗票設備:</label><br>
            <input type="radio" id="TicketingValidatorType_NFC" name="TicketingValidatorType_NFC" value="0" > 否
            <input type="radio" id="TicketingValidatorType_NFC" name="TicketingValidatorType_NFC" value="1" > 是
            <br>

        <label for="TicketingValidatorType_RFID">RFID型驗票設備:</label><br>
            <input type="radio" id="TicketingValidatorType_RFID" name="TicketingValidatorType_RFID" value="0" > 否
            <input type="radio" id="TicketingValidatorType_RFID" name="TicketingValidatorType_RFID" value="1" > 是
            <br>
        
        <label for="TicketingValidatorType_Others">其他種設備:</label><br>
            <input type="radio" id="TicketingValidatorType_Others" name="TicketingValidatorType_Others" value="0" > 否
            <input type="radio" id="TicketingValidatorType_Others" name="TicketingValidatorType_Others" value="1" > 是
            <br>

        <button type="submit">提交</button>
    </form>
    <button type="submit"><a href="admin.php">取消</a></button>
        
    <script>
        // 定義對應的字串列表
        var stringMap = {
            'ChiayiCounty': 'CYQ',
            'Taipei': 'TPE',
            'Taichung': 'TXG',
            'Kaohsiung': 'KHH',
            'YilanCounty': 'ILA',
            'Chiayi': 'CYI',
            'Tainan': 'TNN',
            'Hsinchu':'HSZ',
            'HualienCounty': 'HUA',
            'Taoyuan': 'TAO',
            'NantouCounty': 'NAN',
            'Keelung': 'KEE',
            'KinmenCounty': 'KIN',
            'LienchiangCounty': 'LIE',
            'MiaoliCounty': 'MIA',
            'PingtungCounty': 'PIF',
            'TaitungCounty':'TTT'
        };
        

        // 獲取下拉選單和輸出欄位的元素
        var dropdown = document.getElementById("City");
        var output = document.getElementById("CityCode");

        // 監聽下拉選單的變化
        dropdown.addEventListener("change", function() {
            // 將選取的選項值對應的字串設定到輸出欄位
            output.value = stringMap[dropdown.value] || '';
        });
    </script>
    <?php
            
}

mysqli_close($conn);

?>
</body>
</html>