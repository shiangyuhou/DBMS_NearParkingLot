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
$conn=require_once("config.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    
    $CarParkID=$_POST["CarParkID"];
    $CarParkName_Zh_tw=$_POST["CarParkName_Zh_tw"];
    //檢查table內是否有該筆資料
    $checkCarParks="SELECT * FROM carparks WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw'";
   
    $resultCarParks=$conn->query($checkCarParks);

    $checkParkingServiceTime="SELECT * FROM ParkingServiceTime WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw'";
    $numParkingServiceTime=$conn->query($checkParkingServiceTime);
    $resultParkingServiceTime=$conn->query($checkParkingServiceTime);
    
    $checkParkingSpace="SELECT * FROM ParkingSpace WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw'";
    $numParkingSpace=$conn->query($checkParkingSpace);
    $resultParkingSpace=$conn->query($checkParkingSpace);
    
    $checkParkingTicketing="SELECT * FROM ParkingTicketing WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw'";
    $numParkingTicketing=$conn->query($checkParkingTicketing);
    $resultParkingTicketing=$conn->query($checkParkingTicketing);
    if( mysqli_num_rows($conn->query($checkCarParks))==1 && mysqli_num_rows($numParkingServiceTime)>0 &&mysqli_num_rows($numParkingSpace)>0&&mysqli_num_rows($numParkingTicketing)>0){
            while ($rowCarParks = $resultCarParks->fetch_assoc()) {
                // Access different columns from the same row using the same $row variable
                $OperatorID=$rowCarParks['OperatorID'];
                $Description=$rowCarParks['Description'];
                $CarParkType=$rowCarParks['CarParkType'];
                $ParkingGuideType=$rowCarParks['ParkingGuideType'];
                $CarParkPosition_PositionLat=$rowCarParks['CarParkPosition_PositionLat'];
                $CarParkPosition_PositionLon=$rowCarParks['CarParkPosition_PositionLon'];
                $Address=$rowCarParks['Address'];
                $FareDescription=$rowCarParks['FareDescription'];
                $IsFreeParkingOutOfHours=$rowCarParks['IsFreeParkingOutOfHours'];
                $IsPublic=$rowCarParks['IsPublic'];
                $IsMotorcycle=$rowCarParks['IsMotorcycle'];
                $OperationType=$rowCarParks['OperationType'];
                $LiveOccuppancyAvailable=$rowCarParks['LiveOccuppancyAvailable'];
                $EVRechargingAvailable=$rowCarParks['EVRechargingAvailable'];
                $MonthlyTicketAvailable=$rowCarParks['MonthlyTicketAvailable'];
                $SeasonTicketAvailable=$rowCarParks['SeasonTicketAvailable'];
                $ReservationAvailable=$rowCarParks['ReservationAvailable'];
                $WheelchairAccessible=$rowCarParks['WheelchairAccessible'];
                $OvernightPermitted=$rowCarParks['OvernightPermitted'];
                $TicketMachine=$rowCarParks['TicketMachine'];
                $Toilet=$rowCarParks['Toilet'];
                $Restaurant=$rowCarParks['Restaurant'];
                $GasStation=$rowCarParks['GasStation'];
                $Shop=$rowCarParks['Shop'];
                $Gated=$rowCarParks['Gated'];
                $Lighting=$rowCarParks['Lighting'];
                $SecureParking=$rowCarParks['SecureParking'];
                $TicketOffice=$rowCarParks['TicketOffice'];
                $ProhibitedForAnyHazardousMaterialLoads=$rowCarParks['ProhibitedForAnyHazardousMaterialLoads'];
                $SecurityGuard=$rowCarParks['SecurityGuard'];
                $Supervision=$rowCarParks['Supervision'];
                $City=$rowCarParks['City'];
                $CityCode=$rowCarParks['CityCode'];
            }
            while ($rowParkingServiceTime = $resultParkingServiceTime->fetch_assoc()) {
                $ServiceDay_ServiceTag = $rowParkingServiceTime['ServiceDay_ServiceTag'];
                $ServiceDay_Monday = $rowParkingServiceTime['ServiceDay_Monday'];
                $ServiceDay_Tuesday = $rowParkingServiceTime['ServiceDay_Tuesday'];
                $ServiceDay_Wednesday = $rowParkingServiceTime['ServiceDay_Wednesday'];
                $ServiceDay_Thursday = $rowParkingServiceTime['ServiceDay_Thursday'];
                $ServiceDay_Friday = $rowParkingServiceTime['ServiceDay_Friday'];
                $ServiceDay_Saturday = $rowParkingServiceTime['ServiceDay_Saturday'];
                $ServiceDay_Sunday = $rowParkingServiceTime['ServiceDay_Sunday'];
                $ServiceDay_NationalHolidays = $rowParkingServiceTime['ServiceDay_NationalHolidays'];
                $ServiceTimeDescription = $rowParkingServiceTime['Description'];
                $StartTime = $rowParkingServiceTime['StartTime'];
                $EndTime = $rowParkingServiceTime['EndTime'];
                $FreeOfCharge = $rowParkingServiceTime['FreeOfCharge'];
            }
            while ($rowParkingSpace = $resultParkingSpace->fetch_assoc()) {
                $TotalSpaces=$rowParkingSpace['TotalSpaces'];
                $SpaceType=$rowParkingSpace['SpaceType'];
                $IsMechanical=$rowParkingSpace['IsMechanical'];
                $HasChargingPoint=$rowParkingSpace['HasChargingPoint'];
                $NumberOfSpaces=$rowParkingSpace['NumberOfSpaces'];
                $StayType=$rowParkingSpace['StayType'];
            }
            while ($rowCarParkingTicketing = $resultParkingTicketing->fetch_assoc()) {
                $HasInvoice = $rowCarParkingTicketing['HasInvoice'];
                $InvoiceType_DuplicateUniform = $rowCarParkingTicketing['InvoiceType_DuplicateUniform'];
                $InvoiceType_TriplicateUniform = $rowCarParkingTicketing['InvoiceType_TriplicateUniform'];
                $InvoiceSupport_BANPrinted = $rowCarParkingTicketing['InvoiceSupport_BANPrinted'];
                $InvoiceSupport_Donation = $rowCarParkingTicketing['InvoiceSupport_Donation'];
                $HasEInvoice = $rowCarParkingTicketing['HasEInvoice'];
                $HasEInvoiceCarrier = $rowCarParkingTicketing['HasEInvoiceCarrier'];
                $EInvoiceCarrierType_Generic = $rowCarParkingTicketing['EInvoiceCarrierType_Generic'];
                $EInvoiceCarrierType_SmartCard = $rowCarParkingTicketing['EInvoiceCarrierType_SmartCard'];
                $EInvoiceCarrierType_CreditCard = $rowCarParkingTicketing['EInvoiceCarrierType_CreditCard'];
                $EInvoiceCarrierType_DebitCard = $rowCarParkingTicketing['EInvoiceCarrierType_DebitCard'];
                $EInvoiceCarrierType_MemberCard = $rowCarParkingTicketing['EInvoiceCarrierType_MemberCard'];
                $EInvoiceCarrierType_DonationCode = $rowCarParkingTicketing['EInvoiceCarrierType_DonationCode'];
                $PaymentProcess_PayAndDisplay = $rowCarParkingTicketing['PaymentProcess_PayAndDisplay'];
                $PaymentProcess_PayByPrepaidToken = $rowCarParkingTicketing['PaymentProcess_PayByPrepaidToken'];
                $PaymentProcess_PayAtExitBoothManualCollection = $rowCarParkingTicketing['PaymentProcess_PayAtExitBoothManualCollection'];
                $PaymentProcess_PayAtMachineOnFootPriorToExit = $rowCarParkingTicketing['PaymentProcess_PayAtMachineOnFootPriorToExit'];
                $PaymentProcess_PayBySmartCard = $rowCarParkingTicketing['PaymentProcess_PayBySmartCard'];
                $PaymentProcess_PayByMobile = $rowCarParkingTicketing['PaymentProcess_PayByMobile'];
                $PaymentProcess_PayByEtag = $rowCarParkingTicketing['PaymentProcess_PayByEtag'];
                $PaymentProcess_Others = $rowCarParkingTicketing['PaymentProcess_Others'];
                $PaymentMethod_Cash = $rowCarParkingTicketing['PaymentMethod_Cash'];
                $PaymentMethod_CreditCard = $rowCarParkingTicketing['PaymentMethod_CreditCard'];
                $PaymentMethod_SmartCard = $rowCarParkingTicketing['PaymentMethod_SmartCard'];
                $PaymentMethod_ETC = $rowCarParkingTicketing['PaymentMethod_ETC'];
                $PaymentMethod_MobilePayment = $rowCarParkingTicketing['PaymentMethod_MobilePayment'];
                $PaymentMethod_Token = $rowCarParkingTicketing['PaymentMethod_Token'];
                $PaymentMethod_Others = $rowCarParkingTicketing['PaymentMethod_Others'];
                $SmartCard_EasyCard = $rowCarParkingTicketing['SmartCard_EasyCard'];
                $SmartCard_IPASS = $rowCarParkingTicketing['SmartCard_IPASS'];
                $SmartCard_ICash = $rowCarParkingTicketing['SmartCard_ICash'];
                $SmartCard_HappyCash = $rowCarParkingTicketing['SmartCard_HappyCash'];
                $PaymentDescription = $rowCarParkingTicketing['PaymentDescription'];
                $HasTicketingMachine = $rowCarParkingTicketing['HasTicketingMachine'];
                $TicketingMachine_DisabledFriendly = $rowCarParkingTicketing['TicketingMachine_DisabledFriendly'];
                $HasTicketingValidator = $rowCarParkingTicketing['HasTicketingValidator'];
                $TicketingValidatorType_Contactless = $rowCarParkingTicketing['TicketingValidatorType_Contactless'];
                $TicketingValidatorType_Magnetic = $rowCarParkingTicketing['TicketingValidatorType_Magnetic'];
                $TicketingValidatorType_NFC = $rowCarParkingTicketing['TicketingValidatorType_NFC'];
                $TicketingValidatorType_RFID = $rowCarParkingTicketing['TicketingValidatorType_RFID'];
                $TicketingValidatorType_Others = $rowCarParkingTicketing['TicketingValidatorType_Others'];
            }
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
            <form action="edit.php" method="post">
            <h3>停車場基本資料</h3>   
            <label for="CarParkID">停車場ID:</label>
            <input type="text" id="originCarParkID" style="display: none;" name="originCarParkID" value="<?php echo htmlspecialchars($CarParkID); ?>" required>
            <input type="text" id="CarParkID" style="display: block;" name="CarParkID" value="<?php echo htmlspecialchars($CarParkID); ?>" required>
                        
            <label for="CarParkName_Zh_tw">停車場名稱:</label>
            <input type="text" id="originCarParkName_Zh_tw" style="display: none;" name="originCarParkName_Zh_tw" value="<?php echo htmlspecialchars($CarParkName_Zh_tw); ?>" required>
            <input type="text" id="CarParkName_Zh_tw" style="display: block;" name="CarParkName_Zh_tw" value="<?php echo htmlspecialchars($CarParkName_Zh_tw); ?>" required>

            <label for="OperatorID">營運業者ID:</label>
            <input type="text" id="OperatorID" style="display: block;" name="OperatorID" value="<?php echo htmlspecialchars($OperatorID); ?>" required>
                    
            <label for="Description">停車場敘述:</label>
            <input type="text" id="Description" style="display: block;" name="Description" value="<?php echo htmlspecialchars($Description); ?>">

            <label for="CarParkType">停車場類型:</label><br>
                <input type="radio" name="CarParkType" value="1" <?php echo ($CarParkType === '1') ? 'checked' : ''; ?>> 平面
                <input type="radio" name="CarParkType" value="2" <?php echo ($CarParkType === '2') ? 'checked' : ''; ?>> 立體
                <input type="radio" name="CarParkType" value="3" <?php echo ($CarParkType === '3') ? 'checked' : ''; ?>> 地下
                <input type="radio" name="CarParkType" value="4" <?php echo ($CarParkType === '4') ? 'checked' : ''; ?>> 立體停車塔
                <input type="radio" name="CarParkType" value="5" <?php echo ($CarParkType === '5') ? 'checked' : ''; ?>> 立體機械式
                <input type="radio" name="CarParkType" value="6" <?php echo ($CarParkType === '6') ? 'checked' : ''; ?>> 同時涵蓋 2 種以上
                <input type="radio" name="CarParkType" value="254" <?php echo ($CarParkType === '254') ? 'checked' : ''; ?>> 其他
                <input type="radio" name="CarParkType" value="255" <?php echo ($CarParkType === '255') ? 'checked' : ''; ?>> 未知
                <br>

            <label for="ParkingGuideType">停車導引類型:</label><br>
                
                <input type="radio" name="ParkingGuideType" value="1" <?php echo ($ParkingGuideType === '1') ? 'checked' : ''; ?>> 自行找尋停車位
                <input type="radio" name="ParkingGuideType" value="2" <?php echo ($ParkingGuideType === '2') ? 'checked' : ''; ?>> 有導引輔助設施協助尋找停車位
                <input type="radio" name="ParkingGuideType" value="3" <?php echo ($ParkingGuideType === '3') ? 'checked' : ''; ?>> 人工導引停找車位
                <input type="radio" name="ParkingGuideType" value="4" <?php echo ($ParkingGuideType === '4') ? 'checked' : ''; ?>> 代客泊車
                <input type="radio" name="ParkingGuideType" value="5" <?php echo ($ParkingGuideType === '5') ? 'checked' : ''; ?>> 混合型
                <input type="radio" name="ParkingGuideType" value="254" <?php echo ($ParkingGuideType === '254') ? 'checked' : ''; ?>> 其他
                <input type="radio" name="ParkingGuideType" value="255" <?php echo ($ParkingGuideType === '255') ? 'checked' : ''; ?>> 未知
                <br>

            <label for="CarParkPosition_PositionLat">位置緯度:</label>
                <input type="number" name="CarParkPosition_PositionLat" id="CarParkPosition_PositionLat" value="<?php echo htmlspecialchars($CarParkPosition_PositionLat); ?>" required>
                <br>

            <label for="CarParkPosition_PositionLon">位置經度:</label>
                <input type="number" name="CarParkPosition_PositionLon" id="CarParkPosition_PositionLon" value="<?php echo htmlspecialchars($CarParkPosition_PositionLon); ?>" required>
                <br>

            <label for="Address">停車場地址:</label><br>
                <input type="text" id="Address" style="display: block;" name="Address" value="<?php echo htmlspecialchars($Address); ?>">

            <label for="FareDescription">票價資訊文字描述:</label><br>
                <input type="text" id="FareDescription" style="display: block;" name="FareDescription" value="<?php echo htmlspecialchars($FareDescription); ?>">

            <label for="IsFreeParkingOutOfHours">是否在營業時間外不收費:</label><br>
                <input type="radio" name="IsFreeParkingOutOfHours" value="0" <?php echo ($IsFreeParkingOutOfHours === '0') ? 'checked' : ''; ?>> 否
                <input type="radio" name="IsFreeParkingOutOfHours" value="1" <?php echo ($IsFreeParkingOutOfHours === '1') ? 'checked' : ''; ?>> 是
                <br>
            
            <label for="IsMotorcycle">機車停車場 :</label><br>
                <input type="radio" name="IsMotorcycle" value="0" <?php echo ($IsMotorcycle === '0') ? 'checked' : ''; ?>> 否
                <input type="radio" name="IsMotorcycle" value="1" <?php echo ($IsMotorcycle === '1') ? 'checked' : ''; ?>> 是
                <br>
            
            <label for="IsPublic">是否為公有停車場 :</label><br>
                <input type="radio" name="IsPublic" value="0" <?php echo ($IsPublic === '0') ? 'checked' : ''; ?>> 否
                <input type="radio" name="IsPublic" value="1" <?php echo ($IsPublic === '1') ? 'checked' : ''; ?>> 是
                <br>

            <label for="OperationType">營運種類 :</label><br>
                <input type="radio" name="OperationType" value="1" <?php echo ($OperationType === '1') ? 'checked' : ''; ?>> 公辦民營
                <input type="radio" name="OperationType" value="2" <?php echo ($OperationType === '2') ? 'checked' : ''; ?>> 公辦公營
                <input type="radio" name="OperationType" value="3" <?php echo ($OperationType === '') ? 'checked' : ''; ?>> 私有民營
                <br>
            
            <label for="LiveOccuppancyAvailable">動態剩餘車位資訊:</label><br>
                <input type="radio" name="LiveOccuppancyAvailable" value="0" <?php echo ($LiveOccuppancyAvailable === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="LiveOccuppancyAvailable" value="1" <?php echo ($LiveOccuppancyAvailable === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="EVRechargingAvailable">電動車充電設施:</label><br>
                <input type="radio" name="EVRechargingAvailable" value="0" <?php echo ($EVRechargingAvailable === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="EVRechargingAvailable" value="1" <?php echo ($EVRechargingAvailable === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="MonthlyTicketAvailable">月租:</label><br>
                <input type="radio" name="MonthlyTicketAvailable" value="0" <?php echo ($MonthlyTicketAvailable === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="MonthlyTicketAvailable" value="1" <?php echo ($MonthlyTicketAvailable === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="SeasonTicketAvailable">季租:</label><br>
                <input type="radio" name="SeasonTicketAvailable" value="0" <?php echo ($SeasonTicketAvailable === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="SeasonTicketAvailable" value="1" <?php echo ($SeasonTicketAvailable === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="ReservationAvailable">預約車位:</label><br>
                <input type="radio" name="ReservationAvailable" value="0" <?php echo ($ReservationAvailable === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="ReservationAvailable" value="1" <?php echo ($ReservationAvailable === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="WheelchairAccessible">無障礙設施:</label><br>
                <input type="radio" name="WheelchairAccessible" value="0" <?php echo ($WheelchairAccessible === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="WheelchairAccessible" value="1" <?php echo ($WheelchairAccessible === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="OvernightPermitted">允許停車過夜:</label><br>
                <input type="radio" name="OvernightPermitted" value="0" <?php echo ($OvernightPermitted === '0') ? 'checked' : ''; ?>> 不行
                <input type="radio" name="OvernightPermitted" value="1" <?php echo ($OvernightPermitted === '1') ? 'checked' : ''; ?>> 可以
                <br>

            <label for="TicketMachine">是否有自動售票機:</label><br>
                <input type="radio" name="TicketMachine" value="0" <?php echo ($TicketMachine === '0') ? 'checked' : ''; ?>> 不行
                <input type="radio" name="TicketMachine" value="1" <?php echo ($TicketMachine === '1') ? 'checked' : ''; ?>> 可以
                <br>

            <label for="Toilet">廁所:</label><br>
                <input type="radio" name="Toilet" value="0" <?php echo ($Toilet === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="Toilet" value="1" <?php echo ($Toilet === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="Restaurant">餐廳:</label><br>
                <input type="radio" name="Restaurant" value="0" <?php echo ($Restaurant === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="Restaurant" value="1" <?php echo ($Restaurant === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="GasStation">加油站:</label><br>
                <input type="radio" name="GasStation" value="0" <?php echo ($GasStation === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="GasStation" value="1" <?php echo ($GasStation === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="Gated">商店:</label><br>
                <input type="radio" name="Gated" value="0" <?php echo ($Gated === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="Gated" value="1" <?php echo ($Gated === '1') ? 'checked' : ''; ?>> 有
                <br>
            
            <label for="Shop">是否有閘口:</label><br>
                <input type="radio" name="Shop" value="0" <?php echo ($Shop === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="Shop" value="1" <?php echo ($Shop === '1') ? 'checked' : ''; ?>> 有
                <br>
            
            <label for="Lighting">照明設施:</label><br>
                <input type="radio" name="Lighting" value="0" <?php echo ($Lighting === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="Lighting" value="1" <?php echo ($Lighting === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="SecureParking">停車安全保障:</label><br>
                <input type="radio" name="SecureParking" value="0" <?php echo ($SecureParking === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="SecureParking" value="1" <?php echo ($SecureParking === '1') ? 'checked' : ''; ?>> 有
                <br>

            <label for="TicketOffice">是否有售票處 :</label><br>
                <input type="radio" name="TicketOffice" value="0" <?php echo ($TicketOffice === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="TicketOffice" value="1" <?php echo ($TicketOffice === '1') ? 'checked' : ''; ?>> 有
                <br>

            <label for="ProhibitedForAnyHazardousMaterialLoads">是否允許於停車場區域內裝卸危險物品 :</label><br>
                <input type="radio" name="ProhibitedForAnyHazardousMaterialLoads" value="0" <?php echo ($ProhibitedForAnyHazardousMaterialLoads === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="ProhibitedForAnyHazardousMaterialLoads" value="1" <?php echo ($ProhibitedForAnyHazardousMaterialLoads === '1') ? 'checked' : ''; ?>> 有
                <br>

            <label for="SecurityGuard">管理人員:</label><br>
                <input type="radio" name="SecurityGuard" value="0" <?php echo ($SecurityGuard === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="SecurityGuard" value="1" <?php echo ($SecurityGuard === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="Supervision">監視系統:</label><br>
                <input type="radio" name="Supervision" value="0" <?php echo ($Supervision === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="Supervision" value="1" <?php echo ($Supervision === '1') ? 'checked' : ''; ?>> 有
                <br>

            <!--city & citycode-->
            <label for="City">城市名稱</label><br>
            <select id="City" name="City">
                <?php
                    // 動態生成下拉選單的選項
                    foreach ($items as $item) {
                        echo "<option value='{$item['City']}' data-name='{$item['CityCode']}'>{$item['replacementValue']}</option>";
                    }
                ?>
            </select>
            <br>

            <label for="CityCode">城市代碼:</label><br>
            <input type="text" id="CityCode" name="CityCode" readonly><br>

            <h3>服務時間</h3> 
            <label for="ServiceDay_ServiceTag">服務適用日:</label>
            <input type="text" id="ServiceDay_ServiceTag" style="display: block;" name="ServiceDay_ServiceTag" value="<?php echo htmlspecialchars($ServiceDay_ServiceTag); ?>" >

            <label for="ServiceTimeDescription">服務時段:</label>
            <input type="text" id="ServiceTimeDescription" style="display: block;" name="ServiceTimeDescription" value="<?php echo htmlspecialchars($ServiceTimeDescription); ?>" >

            <label for="ServiceDay">服務日期:</label><br>
                <input type="checkbox" name="ServiceDay_Monday" value="1" <?php echo ($CarParkType === '1') ? 'checked' : ''; ?>> 星期一
                <input type="checkbox" name="ServiceDay_Tuesday" value="1" <?php echo ($CarParkType === '1') ? 'checked' : ''; ?>> 星期二
                <input type="checkbox" name="ServiceDay_Wednesday" value="1" <?php echo ($CarParkType === '1') ? 'checked' : ''; ?>> 星期三
                <input type="checkbox" name="ServiceDay_Thursday" value="1" <?php echo ($CarParkType === '1') ? 'checked' : ''; ?>> 星期四
                <input type="checkbox" name="ServiceDay_Friday" value="1" <?php echo ($CarParkType === '1') ? 'checked' : ''; ?>> 星期五
                <input type="checkbox" name="ServiceDay_Saturday" value="1" <?php echo ($CarParkType === '1') ? 'checked' : ''; ?>> 星期六
                <input type="checkbox" name="ServiceDay_Sunday" value="1" <?php echo ($CarParkType === '1') ? 'checked' : ''; ?>> 星期日
                <input type="checkbox" name="ServiceDay_NationalHolidays" value="1" <?php echo ($CarParkType === '1') ? 'checked' : ''; ?>> 國定假日
                <br>

            <label for="StartTime">開始營業時間:</label><br>
            <input type="time" name="StartTime"  value="<?php echo htmlspecialchars($StartTime); ?>"><br>

            <label for="EndTime">結束營業時間:</label><br>
            <input type="time" name="EndTime"  value="<?php echo htmlspecialchars($EndTime); ?>"><br>

            <label for="FreeOfCharge">免費停車:</label><br>
                <input type="radio" name="FreeOfCharge" value="0" <?php echo ($FreeOfCharge === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="FreeOfCharge" value="1" <?php echo ($FreeOfCharge === '1') ? 'checked' : ''; ?>> 有
                <br>

            <h3>停車場車位數資料</h3> 
            <label for="TotalSpaces">停車位總數:</label>
                <input type="number" name="TotalSpaces" id="TotalSpaces" value="<?php echo htmlspecialchars($TotalSpaces); ?>" >
                <br>

            <label for="SpaceType">停車位類型:</label><br>
                <input type="radio" id="SpaceType" name="SpaceType" value="0" <?php echo ($SpaceType === '0') ? 'checked' : ''; ?> > 所有停車位類型
                <input type="radio" id="SpaceType" name="SpaceType" value="1" <?php echo ($SpaceType === '1') ? 'checked' : ''; ?> > 自小客車
                <input type="radio" id="SpaceType" name="SpaceType" value="2" <?php echo ($SpaceType === '2') ? 'checked' : ''; ?> > 機車位
                <input type="radio" id="SpaceType" name="SpaceType" value="3" <?php echo ($SpaceType === '3') ? 'checked' : ''; ?> > 重型機車位
                <input type="radio" id="SpaceType" name="SpaceType" value="4" <?php echo ($SpaceType === '4') ? 'checked' : ''; ?> > 腳踏車位
                <input type="radio" id="SpaceType" name="SpaceType" value="5" <?php echo ($SpaceType === '5') ? 'checked' : ''; ?> > 大型車位
                <input type="radio" id="SpaceType" name="SpaceType" value="6" <?php echo ($SpaceType === '6') ? 'checked' : ''; ?> > 小型巴士位
                <input type="radio" id="SpaceType" name="SpaceType" value="7" <?php echo ($SpaceType === '7') ? 'checked' : ''; ?> > 孕婦及親子專用車位
                <input type="radio" id="SpaceType" name="SpaceType" value="8" <?php echo ($SpaceType === '8') ? 'checked' : ''; ?> > 婦女車位
                <input type="radio" id="SpaceType" name="SpaceType" value="9" <?php echo ($SpaceType === '9') ? 'checked' : ''; ?> > 身心障礙汽車車位
                <input type="radio" id="SpaceType" name="SpaceType" value="10" <?php echo ($SpaceType === '10') ? 'checked' : ''; ?> > 身心障礙機車車位
                <input type="radio" id="SpaceType" name="SpaceType" value="11" <?php echo ($SpaceType === '11') ? 'checked' : ''; ?> > 電動汽車車位
                <input type="radio" id="SpaceType" name="SpaceType" value="12" <?php echo ($SpaceType === '12') ? 'checked' : ''; ?> > 電動機車車位
                <input type="radio" id="SpaceType" name="SpaceType" value="13" <?php echo ($SpaceType === '13') ? 'checked' : ''; ?> > 復康巴士
                <input type="radio" id="SpaceType" name="SpaceType" value="14" <?php echo ($SpaceType === '14') ? 'checked' : ''; ?> > 月租機車位
                <input type="radio" id="SpaceType" name="SpaceType" value="15" <?php echo ($SpaceType === '15') ? 'checked' : ''; ?> > 月租汽車位
                <input type="radio" id="SpaceType" name="SpaceType" value="16" <?php echo ($SpaceType === '16') ? 'checked' : ''; ?> > 季租機車位
                <input type="radio" id="SpaceType" name="SpaceType" value="17" <?php echo ($SpaceType === '17') ? 'checked' : ''; ?> > 季租汽車位
                <input type="radio" id="SpaceType" name="SpaceType" value="18" <?php echo ($SpaceType === '18') ? 'checked' : ''; ?> > 半年租機車位
                <input type="radio" id="SpaceType" name="SpaceType" value="19" <?php echo ($SpaceType === '19') ? 'checked' : ''; ?> > 半年租汽車位
                <input type="radio" id="SpaceType" name="SpaceType" value="20" <?php echo ($SpaceType === '20') ? 'checked' : ''; ?> > 年租機車位
                <input type="radio" id="SpaceType" name="SpaceType" value="21" <?php echo ($SpaceType === '21') ? 'checked' : ''; ?> > 年租汽車位
                <input type="radio" id="SpaceType" name="SpaceType" value="22" <?php echo ($SpaceType === '22') ? 'checked' : ''; ?> > 租賃機車位
                <input type="radio" id="SpaceType" name="SpaceType" value="23" <?php echo ($SpaceType === '23') ? 'checked' : ''; ?> > 租賃汽車位
                <input type="radio" id="SpaceType" name="SpaceType" value="24" <?php echo ($SpaceType === '24') ? 'checked' : ''; ?> > 卸貨車位
                <input type="radio" id="SpaceType" name="SpaceType" value="25" <?php echo ($SpaceType === '25') ? 'checked' : ''; ?> > 計程車位
                <input type="radio" id="SpaceType" name="SpaceType" value="26" <?php echo ($SpaceType === '26') ? 'checked' : ''; ?> > 夜間安心停車
                <input type="radio" id="SpaceType" name="SpaceType" value="27" <?php echo ($SpaceType === '27') ? 'checked' : ''; ?> > 臨時停車
                <input type="radio" id="SpaceType" name="SpaceType" value="28" <?php echo ($SpaceType === '28') ? 'checked' : ''; ?> > 專用停車
                <input type="radio" id="SpaceType" name="SpaceType" value="29" <?php echo ($SpaceType === '29') ? 'checked' : ''; ?> > 預約停車
                <input type="radio" id="SpaceType" name="SpaceType" value="254" <?php echo ($SpaceType === '254') ? 'checked' : ''; ?> > 其他
                <input type="radio" id="SpaceType" name="SpaceType" value="255" <?php echo ($SpaceType === '255') ? 'checked' : ''; ?> > 未知
                <br>
            
            <label for="IsMechanical">是否為機械車位:</label><br>
                <input type="radio" id="IsMechanical" name="IsMechanical" value="0" <?php echo ($IsMechanical === '0') ? 'checked' : ''; ?> > 否
                <input type="radio" id="IsMechanical" name="IsMechanical" value="1" <?php echo ($IsMechanical === '1') ? 'checked' : ''; ?> > 是
                <br>

            <label for="HasChargingPoint">是否附屬充電樁:</label><br>
                <input type="radio" id="HasChargingPoint" name="HasChargingPoint" value="0" <?php echo ($HasChargingPoint === '0') ? 'checked' : ''; ?> > 否
                <input type="radio" id="HasChargingPoint" name="HasChargingPoint" value="1" <?php echo ($HasChargingPoint === '1') ? 'checked' : ''; ?> > 是
                <br>

            <label for="NumberOfSpaces">該停車位類型停車位數:</label><br>
                <input type="number" name="NumberOfSpaces" id="NumberOfSpaces" value="<?php echo htmlspecialchars($NumberOfSpaces); ?>" >
                <br>

            <label for="NumberOfSpaces">停車停留類型:</label><br>
                <input type="radio" id="StayType" name="StayType" value="1" <?php echo ($StayType === '1') ? 'checked' : ''; ?> > 臨停接送
                <input type="radio" id="StayType" name="StayType" value="2" <?php echo ($StayType === '2') ? 'checked' : ''; ?> > 短時間停車
                <input type="radio" id="StayType" name="StayType" value="3" <?php echo ($StayType === '3') ? 'checked' : ''; ?> > 長時間停車
                <input type="radio" id="StayType" name="StayType" value="4" <?php echo ($StayType === '4') ? 'checked' : ''; ?> > 無限制停放
                <input type="radio" id="StayType" name="StayType" value="5" <?php echo ($StayType === '5') ? 'checked' : ''; ?> > 租賃
                <input type="radio" id="StayType" name="StayType" value="254" <?php echo ($StayType === '254') ? 'checked' : ''; ?> > 其他
                <input type="radio" id="StayType" name="StayType" value="255" <?php echo ($StayType === '255') ? 'checked' : ''; ?> > 未知
                <br>

            

            <h3>收費方式</h3>
            <label for="HasInvoice">是否開立發票:</label><br>
            <input type="radio" id="HasInvoice" name="HasInvoice" value="1"  <?php echo ($HasInvoice === '1') ? 'checked' : ''; ?>>是
            <input type="radio" id="HasInvoice" name="HasInvoice" value="0" <?php echo ($HasInvoice === '0') ? 'checked' : ''; ?>>否
            <br>
        
            <label for="InvoiceType_DuplicateUniform">二聯式發票:</label><br>
            <input type="radio" id="InvoiceType_DuplicateUniform" name="InvoiceType_DuplicateUniform" value="0" <?php echo ($InvoiceType_DuplicateUniform === '0') ? 'checked' : ''; ?> >否
            <input type="radio" id="InvoiceType_DuplicateUniform" name="InvoiceType_DuplicateUniform" value="1" <?php echo ($InvoiceType_DuplicateUniform === '1') ? 'checked' : ''; ?> >是
            <br>

            <label for="InvoiceType_TriplicateUniform">三聯式發票(含統編):</label><br>
            <input type="radio" id="InvoiceType_TriplicateUniform" name="InvoiceType_TriplicateUniform" value="0" <?php echo ($InvoiceType_TriplicateUniform === '0') ? 'checked' : ''; ?> > 否
            <input type="radio" id="InvoiceType_TriplicateUniform" name="InvoiceType_TriplicateUniform" value="1" <?php echo ($InvoiceType_TriplicateUniform === '1') ? 'checked' : ''; ?> > 是
            <br>
            
            <label for="InvoiceSupport_BANPrinted">是否能打統一編號:</label><br>
            <input type="radio" id="InvoiceSupport_BANPrinted" name="InvoiceSupport_BANPrinted" value="0" <?php echo ($InvoiceSupport_BANPrinted === '0') ? 'checked' : ''; ?> > 否
            <input type="radio" id="InvoiceSupport_BANPrinted" name="InvoiceSupport_BANPrinted" value="1" <?php echo ($InvoiceSupport_BANPrinted === '1') ? 'checked' : ''; ?> > 是
            <br>
            
            <label for="InvoiceSupport_Donation">是否支援愛心捐贈:</label><br>
            <input type="radio" id="InvoiceSupport_Donation" name="InvoiceSupport_Donation" value="0" <?php echo ($InvoiceSupport_Donation === '0') ? 'checked' : ''; ?> > 否
            <input type="radio" id="InvoiceSupport_Donation" name="InvoiceSupport_Donation" value="1" <?php echo ($InvoiceSupport_Donation === '1') ? 'checked' : ''; ?> > 是
            <br>

            <label for="HasEInvoice">是否開立電子發票:</label><br>
            <input type="radio" id="HasEInvoice" name="HasEInvoice" value="0" <?php echo ($HasEInvoice === '0') ? 'checked' : ''; ?> > 否
            <input type="radio" id="HasEInvoice" name="HasEInvoice" value="1" <?php echo ($HasEInvoice === '1') ? 'checked' : ''; ?> > 是
            <br>

            <label for="HasEInvoiceCarrier">電子發票是否提供載具:</label><br>
            <input type="radio" id="HasEInvoiceCarrier" name="HasEInvoiceCarrier" value="0" <?php echo ($HasEInvoiceCarrier === '0') ? 'checked' : ''; ?> > 否
            <input type="radio" id="HasEInvoiceCarrier" name="HasEInvoiceCarrier" value="1" <?php echo ($HasEInvoiceCarrier === '1') ? 'checked' : ''; ?> > 是
            <br>

            <label for="EInvoiceCarrierType_Generic">共通性載具:</label><br>
            <input type="radio" id="EInvoiceCarrierType_Generic" name="EInvoiceCarrierType_Generic" value="0" <?php echo ($EInvoiceCarrierType_Generic === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="EInvoiceCarrierType_Generic" name="EInvoiceCarrierType_Generic" value="1" <?php echo ($EInvoiceCarrierType_Generic === '1') ? 'checked' : ''; ?> > 有
            <br>
            
            <label for="EInvoiceCarrierType_SmartCard">票證載具:</label><br>
            <input type="radio" id="EInvoiceCarrierType_SmartCard" name="EInvoiceCarrierType_SmartCard" value="0" <?php echo ($EInvoiceCarrierType_SmartCard === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="EInvoiceCarrierType_SmartCard" name="EInvoiceCarrierType_SmartCard" value="1" <?php echo ($EInvoiceCarrierType_SmartCard === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="EInvoiceCarrierType_CreditCard">信用卡載具:</label><br>
            <input type="radio" id="EInvoiceCarrierType_CreditCard" name="EInvoiceCarrierType_CreditCard" value="0" <?php echo ($EInvoiceCarrierType_CreditCard === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="EInvoiceCarrierType_CreditCard" name="EInvoiceCarrierType_CreditCard" value="1" <?php echo ($EInvoiceCarrierType_CreditCard === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="EInvoiceCarrierType_DebitCard">金融卡載具:</label><br>
            <input type="radio" id="EInvoiceCarrierType_DebitCard" name="EInvoiceCarrierType_DebitCard" value="0" <?php echo ($EInvoiceCarrierType_DebitCard === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="EInvoiceCarrierType_DebitCard" name="EInvoiceCarrierType_DebitCard" value="1" <?php echo ($EInvoiceCarrierType_DebitCard === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="EInvoiceCarrierType_MemberCard">會員卡載具:</label><br>
            <input type="radio" id="EInvoiceCarrierType_MemberCard" name="EInvoiceCarrierType_MemberCard" value="0" <?php echo ($EInvoiceCarrierType_MemberCard === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="EInvoiceCarrierType_MemberCard" name="EInvoiceCarrierType_MemberCard" value="1" <?php echo ($EInvoiceCarrierType_MemberCard === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="EInvoiceCarrierType_DonationCode">愛心捐贈代碼:</label><br>
            <input type="radio" id="EInvoiceCarrierType_DonationCode" name="EInvoiceCarrierType_DonationCode" value="0" <?php echo ($EInvoiceCarrierType_DonationCode === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="EInvoiceCarrierType_DonationCode" name="EInvoiceCarrierType_DonationCode" value="1" <?php echo ($EInvoiceCarrierType_DonationCode === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentProcess_PayAndDisplay">先付費再停車 :</label><br>
            <input type="radio" id="PaymentProcess_PayAndDisplay" name="PaymentProcess_PayAndDisplay" value="0" <?php echo ($PaymentProcess_PayAndDisplay === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentProcess_PayAndDisplay" name="PaymentProcess_PayAndDisplay" value="1" <?php echo ($PaymentProcess_PayAndDisplay === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentProcess_PayByPrepaidToken">先付費取得代幣後停車 :</label><br>
            <input type="radio" id="PaymentProcess_PayByPrepaidToken" name="PaymentProcess_PayByPrepaidToken" value="0" <?php echo ($PaymentProcess_PayByPrepaidToken === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentProcess_PayByPrepaidToken" name="PaymentProcess_PayByPrepaidToken" value="1" <?php echo ($PaymentProcess_PayByPrepaidToken === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentProcess_PayAtExitBoothManualCollection">出口收費亭人工收費 :</label><br>
            <input type="radio" id="PaymentProcess_PayAtExitBoothManualCollection" name="PaymentProcess_PayAtExitBoothManualCollection" value="0" <?php echo ($PaymentProcess_PayAtExitBoothManualCollection === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentProcess_PayAtExitBoothManualCollection" name="PaymentProcess_PayAtExitBoothManualCollection" value="1" <?php echo ($PaymentProcess_PayAtExitBoothManualCollection === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentProcess_PayAtMachineOnFootPriorToExit">離場前先於繳費機繳費 :</label><br>
            <input type="radio" id="PaymentProcess_PayAtMachineOnFootPriorToExit" name="PaymentProcess_PayAtMachineOnFootPriorToExit" value="0" <?php echo ($PaymentProcess_PayAtMachineOnFootPriorToExit === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentProcess_PayAtMachineOnFootPriorToExit" name="PaymentProcess_PayAtMachineOnFootPriorToExit" value="1" <?php echo ($PaymentProcess_PayAtMachineOnFootPriorToExit === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentProcess_PayBySmartCard">利用電子票證付費 :</label><br>
            <input type="radio" id="PaymentProcess_PayBySmartCard" name="PaymentProcess_PayBySmartCard" value="0" <?php echo ($PaymentProcess_PayBySmartCard === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentProcess_PayBySmartCard" name="PaymentProcess_PayBySmartCard" value="1" <?php echo ($PaymentProcess_PayBySmartCard === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentProcess_PayByMobile">利用手機行動裝置付費 :</label><br>
            <input type="radio" id="PaymentProcess_PayByMobile" name="PaymentProcess_PayByMobile" value="0" <?php echo ($PaymentProcess_PayByMobile === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentProcess_PayByMobile" name="PaymentProcess_PayByMobile" value="1" <?php echo ($PaymentProcess_PayByMobile === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentProcess_PayByEtag">利用eTag感應付費 :</label><br>
            <input type="radio" id="PaymentProcess_PayByEtag" name="PaymentProcess_PayByEtag" value="0" <?php echo ($PaymentProcess_PayByEtag === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentProcess_PayByEtag" name="PaymentProcess_PayByEtag" value="1" <?php echo ($PaymentProcess_PayByEtag === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentProcess_Others">其他付款方式 :</label><br>
            <input type="radio" id="PaymentProcess_Others" name="PaymentProcess_Others" value="0" <?php echo ($PaymentProcess_Others === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentProcess_Others" name="PaymentProcess_Others" value="1" <?php echo ($PaymentProcess_Others === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentMethod_Cash">現金:</label><br>
            <input type="radio" id="PaymentMethod_Cash" name="PaymentMethod_Cash" value="0" <?php echo ($PaymentMethod_Cash === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentMethod_Cash" name="PaymentMethod_Cash" value="1" <?php echo ($PaymentMethod_Cash === '1') ? 'checked' : ''; ?> > 有
            <br>
            <label for="PaymentMethod_CreditCard">信用卡:</label><br>
            <input type="radio" id="PaymentMethod_CreditCard" name="PaymentMethod_CreditCard" value="0" <?php echo ($PaymentMethod_CreditCard === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentMethod_CreditCard" name="PaymentMethod_CreditCard" value="1" <?php echo ($PaymentMethod_CreditCard === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentMethod_SmartCard">電子票證:</label><br>
            <input type="radio" id="PaymentMethod_SmartCard" name="PaymentMethod_SmartCard" value="0" <?php echo ($PaymentMethod_SmartCard === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentMethod_SmartCard" name="PaymentMethod_SmartCard" value="1" <?php echo ($PaymentMethod_SmartCard === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentMethod_ETC">ETC 帳戶:</label><br>
            <input type="radio" id="PaymentMethod_ETC" name="PaymentMethod_ETC" value="0" <?php echo ($PaymentMethod_ETC === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentMethod_ETC" name="PaymentMethod_ETC" value="1" <?php echo ($PaymentMethod_ETC === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentMethod_MobilePayment">行動支付:</label><br>
            <input type="radio" id="PaymentMethod_MobilePayment" name="PaymentMethod_MobilePayment" value="0" <?php echo ($PaymentMethod_MobilePayment === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentMethod_MobilePayment" name="PaymentMethod_MobilePayment" value="1" <?php echo ($PaymentMethod_MobilePayment === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentMethod_Token">代幣:</label><br>
            <input type="radio" id="PaymentMethod_Token" name="PaymentMethod_Token" value="0" <?php echo ($PaymentMethod_Token === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentMethod_Token" name="PaymentMethod_Token" value="1" <?php echo ($PaymentMethod_Token === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentMethod_Others">其他付款方法 :</label><br>
            <input type="radio" id="PaymentMethod_Others" name="PaymentMethod_Others" value="0" <?php echo ($PaymentMethod_Others === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="PaymentMethod_Others" name="PaymentMethod_Others" value="1" <?php echo ($PaymentMethod_Others === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="SmartCard_EasyCard">悠遊卡:</label><br>
            <input type="radio" id="SmartCard_EasyCard" name="SmartCard_EasyCard" value="0" <?php echo ($SmartCard_EasyCard === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="SmartCard_EasyCard" name="SmartCard_EasyCard" value="1" <?php echo ($SmartCard_EasyCard === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="SmartCard_IPASS">一卡通:</label><br>
            <input type="radio" id="SmartCard_IPASS" name="SmartCard_IPASS" value="0" <?php echo ($SmartCard_IPASS === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="SmartCard_IPASS" name="SmartCard_IPASS" value="1" <?php echo ($SmartCard_IPASS === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="SmartCard_ICash">愛金卡:</label><br>
            <input type="radio" id="SmartCard_ICash" name="SmartCard_ICash" value="0" <?php echo ($SmartCard_ICash === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="SmartCard_ICash" name="SmartCard_ICash" value="1" <?php echo ($SmartCard_ICash === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="SmartCard_HappyCash">有錢卡:</label><br>
            <input type="radio" id="SmartCard_HappyCash" name="SmartCard_HappyCash" value="0" <?php echo ($SmartCard_HappyCash === '0') ? 'checked' : ''; ?> > 無
            <input type="radio" id="SmartCard_HappyCash" name="SmartCard_HappyCash" value="1" <?php echo ($SmartCard_HappyCash === '1') ? 'checked' : ''; ?> > 有
            <br>

            <label for="PaymentDescription">付款資訊文字描述:</label>
            <input type="text" id="PaymentDescription" style="display: block;" name="PaymentDescription" value="<?php echo htmlspecialchars($PaymentDescription); ?>" >

            <label for="HasTicketingMachine">自動繳費機:</label><br>
                <input type="radio" id="HasTicketingMachine" name="HasTicketingMachine" value="0" <?php echo ($HasTicketingMachine === '0') ? 'checked' : ''; ?> > 無
                <input type="radio" id="HasTicketingMachine" name="HasTicketingMachine" value="1" <?php echo ($HasTicketingMachine === '1') ? 'checked' : ''; ?> > 有
                <br>

            <label for="TicketingMachine_DisabledFriendly">自動繳費機對身心障礙人士操作介面高度是否友善:</label><br>
                <input type="radio" id="TicketingMachine_DisabledFriendly" name="TicketingMachine_DisabledFriendly" value="0" <?php echo ($TicketingMachine_DisabledFriendly === '0') ? 'checked' : ''; ?> > 否
                <input type="radio" id="TicketingMachine_DisabledFriendly" name="TicketingMachine_DisabledFriendly" value="1" <?php echo ($TicketingMachine_DisabledFriendly === '1') ? 'checked' : ''; ?> > 是
                <br>

            <label for="HasTicketingValidator">票證驗票設備:</label><br>
                <input type="radio" id="HasTicketingValidator" name="HasTicketingValidator" value="0" <?php echo ($HasTicketingValidator === '0') ? 'checked' : ''; ?> > 無
                <input type="radio" id="HasTicketingValidator" name="HasTicketingValidator" value="1" <?php echo ($HasTicketingValidator === '1') ? 'checked' : ''; ?> > 有
                <br>
            
            <label for="TicketingValidatorType_Contactless">非接觸式讀卡設備:</label><br>
                <input type="radio" id="TicketingValidatorType_Contactless" name="TicketingValidatorType_Contactless" value="0" <?php echo ($TicketingValidatorType_Contactless === '0') ? 'checked' : ''; ?> > 否
                <input type="radio" id="TicketingValidatorType_Contactless" name="TicketingValidatorType_Contactless" value="1" <?php echo ($TicketingValidatorType_Contactless === '1') ? 'checked' : ''; ?> > 是
                <br>

            <label for="TicketingValidatorType_Magnetic">磁票型驗票設備(接觸式):</label><br>
                <input type="radio" id="TicketingValidatorType_Magnetic" name="TicketingValidatorType_Magnetic" value="0" <?php echo ($TicketingValidatorType_Magnetic === '0') ? 'checked' : ''; ?> > 否
                <input type="radio" id="TicketingValidatorType_Magnetic" name="TicketingValidatorType_Magnetic" value="1" <?php echo ($TicketingValidatorType_Magnetic === '1') ? 'checked' : ''; ?> > 是
                <br>

            <label for="TicketingValidatorType_NFC">NFC型驗票設備:</label><br>
                <input type="radio" id="TicketingValidatorType_NFC" name="TicketingValidatorType_NFC" value="0" <?php echo ($TicketingValidatorType_NFC === '0') ? 'checked' : ''; ?> > 否
                <input type="radio" id="TicketingValidatorType_NFC" name="TicketingValidatorType_NFC" value="1" <?php echo ($TicketingValidatorType_NFC === '1') ? 'checked' : ''; ?> > 是
                <br>

            <label for="TicketingValidatorType_RFID">RFID型驗票設備:</label><br>
                <input type="radio" id="TicketingValidatorType_RFID" name="TicketingValidatorType_RFID" value="0" <?php echo ($TicketingValidatorType_RFID === '0') ? 'checked' : ''; ?> > 否
                <input type="radio" id="TicketingValidatorType_RFID" name="TicketingValidatorType_RFID" value="1" <?php echo ($TicketingValidatorType_RFID === '1') ? 'checked' : ''; ?> > 是
                <br>
            
            <label for="TicketingValidatorType_Others">其他種設備:</label><br>
                <input type="radio" id="TicketingValidatorType_Others" name="TicketingValidatorType_Others" value="0" <?php echo ($TicketingValidatorType_Others === '0') ? 'checked' : ''; ?> > 否
                <input type="radio" id="TicketingValidatorType_Others" name="TicketingValidatorType_Others" value="1" <?php echo ($TicketingValidatorType_Others === '1') ? 'checked' : ''; ?> > 是
                <br>

            <button type="submit">提交</button>
        </form>
        <button type="submit"><a href="admin.php">取消</a></button>
         
        <script>
            // 定義從 PHP 傳遞過來的項目列表
            var itemMap = <?php echo json_encode($items); ?>;

            // 獲取下拉選單和輸出欄位的元素
            var dropdown = document.getElementById("City");
            var output = document.getElementById("CityCode");

            // 預設選擇第一個選項
            var defaultSelectedIndex = 0;
            dropdown.selectedIndex = defaultSelectedIndex;
            output.value = dropdown.options[defaultSelectedIndex].getAttribute('data-name');

            // 監聽下拉選單的變化
            dropdown.addEventListener("change", function() {
                // 將選取的選項的 data-name 屬性值設定到輸出欄位
                var selectedOption = dropdown.options[dropdown.selectedIndex];
                output.value = selectedOption ? selectedOption.getAttribute('data-name') : '';
            });
        </script>
        <?php
            
    }
    else{
        echo "查無該筆資料<br>";
        echo "<a href='admin.php'>返回系統</a>";
        header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        exit;
    }
}


mysqli_close($conn);

 
?>
</body>
</html>