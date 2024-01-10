<!DOCTYPE html>
<html lang="zh-tw">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin.css">
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
    
    $CarParkID=$_POST["CarParkID"];
    $CarParkName_Zh_tw=$_POST["CarParkName_Zh_tw"];
    //檢查table內是否有該筆資料
    $checkCarParks="SELECT * FROM CarParks WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw'";
   
    $resultCarParks=$conn->query($checkCarParks);
    ?><script>console.log("check");</script><?php

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
                // print_r($rowCarParks);
                // Access different columns from the same row using the same $row variable
                $OperatorID=$rowCarParks['OperatorID'];
                $Description=$rowCarParks['Description'];
                $CarParkType=$rowCarParks['CarParkType'];
                $ParkingGuideType=$rowCarParks['ParkingGuideType'];
                $CarParkPosition_PositionLat=$rowCarParks['PositionLat'];
                $CarParkPosition_PositionLon=$rowCarParks['PositionLon'];
                $Address=$rowCarParks['Address'];
                $FareDescription=$rowCarParks['FareDescription'];
                $IsMotorcycle=$rowCarParks['IsMotorcycle'];
                $LiveOccuppancyAvailable=$rowCarParks['LiveOccupancyAvailable'];
                $EVRechargingAvailable=$rowCarParks['EVRechargingAvailable'];
                $MonthlyTicketAvailable=$rowCarParks['MonthlyTicketAvailable'];
                $SeasonTicketAvailable=$rowCarParks['SeasonTicketAvailable'];
                $ReservationAvailable=$rowCarParks['ReservationAvailable'];
                $WheelchairAccessible=$rowCarParks['WheelchairAccessible'];
                $OvernightPermitted=$rowCarParks['OvernightPermitted'];
                $Toilet=$rowCarParks['Toilet'];
                $Restaurant=$rowCarParks['Restaurant'];
                $GasStation=$rowCarParks['GasStation'];
                $Shop=$rowCarParks['Shop'];
                $Lighting=$rowCarParks['Lighting'];
                $SecureParking=$rowCarParks['SecureParking'];
                $SecurityGuard=$rowCarParks['SecurityGuard'];
                $Supervision=$rowCarParks['Supervision'];
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
            ?>
            <!-- <div><?php echo $ServiceDay_Monday; ?></div> -->
            <form action="edit.php" method="post">
            <h3>基本資料</h3>   
            <label for="CarParkID">停車場ID:</label>
            <input type="text" id="originCarParkID" style="display: none;" name="originCarParkID" value="<?php echo htmlspecialchars($CarParkID); ?>" required>
            <input type="text" id="CarParkID" style="display: block;" name="CarParkID" value="<?php echo htmlspecialchars($CarParkID); ?>" required>
                        
            <label for="CarParkName_Zh_tw">停車場名稱:</label>
            <input type="text" id="originCarParkName_Zh_tw" style="display: none;" name="originCarParkName_Zh_tw" value="<?php echo htmlspecialchars($CarParkName_Zh_tw); ?>" required>
            <input type="text" id="CarParkName_Zh_tw" style="display: block;" name="CarParkName_Zh_tw" value="<?php echo htmlspecialchars($CarParkName_Zh_tw); ?>" required>

            <label for="OperatorID">負責單位ID:</label>
            <input type="text" id="OperatorID" style="display: block;" name="OperatorID" value="<?php echo htmlspecialchars($OperatorID); ?>" required>
                    
            <label for="Description">停車場敘述:</label>
            <input type="text" id="Description" style="display: block;" name="Description" value="<?php echo htmlspecialchars($Description); ?>">

            <label for="TotalSpaces">停車位總數:</label>
                <input type="number" name="TotalSpaces" id="TotalSpaces" value="<?php echo htmlspecialchars($TotalSpaces); ?>" >
                <br>

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

            <label for="IsMotorcycle">機車停車場:</label><br>
                <input type="radio" name="IsMotorcycle" value="0" <?php echo ($IsMotorcycle === '0') ? 'checked' : ''; ?>> 否
                <input type="radio" name="IsMotorcycle" value="1" <?php echo ($IsMotorcycle === '1') ? 'checked' : ''; ?>> 是
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
            <label for="Shop">商店:</label><br>
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
            <label for="SecurityGuard">管理人員:</label><br>
                <input type="radio" name="SecurityGuard" value="0" <?php echo ($SecurityGuard === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="SecurityGuard" value="1" <?php echo ($SecurityGuard === '1') ? 'checked' : ''; ?>> 有
                <br>
            <label for="Supervision">監視系統:</label><br>
                <input type="radio" name="Supervision" value="0" <?php echo ($Supervision === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="Supervision" value="1" <?php echo ($Supervision === '1') ? 'checked' : ''; ?>> 有
                <br>

            <label for="HasTicketingMachine">自動繳費機:</label><br>
                <input type="radio" id="HasTicketingMachine" name="HasTicketingMachine" value="0" <?php echo ($HasTicketingMachine === '0') ? 'checked' : ''; ?> > 無
                <input type="radio" id="HasTicketingMachine" name="HasTicketingMachine" value="1" <?php echo ($HasTicketingMachine === '1') ? 'checked' : ''; ?> > 有
                <br>
            <h3>服務時間</h3> 
            <label for="ServiceDay_ServiceTag">服務適用日:</label>
            <input type="text" id="ServiceDay_ServiceTag" style="display: block;" name="ServiceDay_ServiceTag" value="<?php echo htmlspecialchars($ServiceDay_ServiceTag); ?>" >

            <label for="ServiceTimeDescription">服務時段:</label>
            <input type="text" id="ServiceTimeDescription" style="display: block;" name="ServiceTimeDescription" value="<?php echo htmlspecialchars($ServiceTimeDescription); ?>" >

            <label for="ServiceDay">服務日期:</label><br>
                <input type="checkbox" name="ServiceDay_Monday" value="1" <?php echo ($ServiceDay_Monday === '1') ? 'checked' : ''; ?>> 星期一
                <input type="checkbox" name="ServiceDay_Tuesday" value="1" <?php echo ($ServiceDay_Tuesday === '1') ? 'checked' : ''; ?>> 星期二
                <input type="checkbox" name="ServiceDay_Wednesday" value="1" <?php echo ($ServiceDay_Wednesday === '1') ? 'checked' : ''; ?>> 星期三
                <input type="checkbox" name="ServiceDay_Thursday" value="1" <?php echo ($ServiceDay_Thursday === '1') ? 'checked' : ''; ?>> 星期四
                <input type="checkbox" name="ServiceDay_Friday" value="1" <?php echo ($ServiceDay_Friday === '1') ? 'checked' : ''; ?>> 星期五
                <input type="checkbox" name="ServiceDay_Saturday" value="1" <?php echo ($ServiceDay_Saturday === '1') ? 'checked' : ''; ?>> 星期六
                <input type="checkbox" name="ServiceDay_Sunday" value="1" <?php echo ($ServiceDay_Sunday === '1') ? 'checked' : ''; ?>> 星期日
                <input type="checkbox" name="ServiceDay_NationalHolidays" value="1" <?php echo ($SServiceDay_NationalHolidays === '1') ? 'checked' : ''; ?>> 國定假日
                <br>

            <label for="StartTime">開始營業時間:</label><br>
            <input type="time" name="StartTime"  value="<?php echo htmlspecialchars($StartTime); ?>"><br>

            <label for="EndTime">結束營業時間:</label><br>
            <input type="time" name="EndTime"  value="<?php echo htmlspecialchars($EndTime); ?>"><br>

            <label for="FreeOfCharge">免費停車:</label><br>
                <input type="radio" name="FreeOfCharge" value="0" <?php echo ($FreeOfCharge === '0') ? 'checked' : ''; ?>> 無
                <input type="radio" name="FreeOfCharge" value="1" <?php echo ($FreeOfCharge === '1') ? 'checked' : ''; ?>> 有
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

            <button type="submit">提交</button>
        </form>
        <button type="submit"><a href="admin.php">取消</a></button>
            
        <?php
            
    }
    else{
        echo "查無該筆資料<br>";
        echo "<a href='admin.php'>返回系統</a>";
        // header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        // exit;
    }
}


mysqli_close($conn);

 
?>
</body>
</html>