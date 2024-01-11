<?php
$conn=require_once("../connect.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    
    
    
        $CarParkID=$_POST["CarParkID"];
        $CarParkName_Zh_tw=$_POST["CarParkName_Zh_tw"];
        $OperatorID=$_POST['OperatorID'];
        $Description=$_POST['Description'];
        $CarParkType=$_POST['CarParkType'];
        $ParkingGuideType=$_POST['ParkingGuideType'];
        $CarParkPosition_PositionLat=$_POST['CarParkPosition_PositionLat'];
        $CarParkPosition_PositionLon=$_POST['CarParkPosition_PositionLon'];
        $Address=$_POST['Address'];
        $FareDescription=$_POST['FareDescription'];
        $IsFreeParkingOutOfHours=$_POST['IsFreeParkingOutOfHours'];
        $IsPublic=$_POST['IsPublic'];
        $IsMotorcycle=$_POST['IsMotorcycle'];
        $OperationType=$_POST['OperationType'];
        $LiveOccuppancyAvailable=$_POST['LiveOccuppancyAvailable'];
        $EVRechargingAvailable=$_POST['EVRechargingAvailable'];
        $MonthlyTicketAvailable=$_POST['MonthlyTicketAvailable'];
        $SeasonTicketAvailable=$_POST['SeasonTicketAvailable'];
        $ReservationAvailable=$_POST['ReservationAvailable'];
        $WheelchairAccessible=$_POST['WheelchairAccessible'];
        $OvernightPermitted=$_POST['OvernightPermitted'];
        $TicketMachine=$_POST['TicketMachine'];
        $Toilet=$_POST['Toilet'];
        $Restaurant=$_POST['Restaurant'];
        $GasStation=$_POST['GasStation'];
        $Shop=$_POST['Shop'];
        $Gated=$_POST['Gated'];
        $Lighting=$_POST['Lighting'];
        $SecureParking=$_POST['SecureParking'];
        $TicketOffice=$_POST['TicketOffice'];
        $ProhibitedForAnyHazardousMaterialLoads=$_POST['ProhibitedForAnyHazardousMaterialLoads'];
        $SecurityGuard=$_POST['SecurityGuard'];
        $Supervision=$_POST['Supervision'];
        $City=$_POST['City'];
        $CityCode=$_POST['CityCode'];

        

        $ServiceDay_ServiceTag = $_POST['ServiceDay_ServiceTag'];
        $ServiceDay_Monday = $_POST['ServiceDay_Monday'];
        $ServiceDay_Tuesday = $_POST['ServiceDay_Tuesday'];
        $ServiceDay_Wednesday = $_POST['ServiceDay_Wednesday'];
        $ServiceDay_Thursday = $_POST['ServiceDay_Thursday'];
        $ServiceDay_Friday = $_POST['ServiceDay_Friday'];
        $ServiceDay_Saturday = $_POST['ServiceDay_Saturday'];
        $ServiceDay_Sunday = $_POST['ServiceDay_Sunday'];
        $ServiceDay_NationalHolidays = $_POST['ServiceDay_NationalHolidays'];
        $ServiceTimeDescription = $_POST['ServiceTimeDescription'];
        $StartTime = $_POST['StartTime'];
        $EndTime = $_POST['EndTime'];
        $FreeOfCharge = $_POST['FreeOfCharge'];

        $TotalSpaces=$_POST['TotalSpaces'];
        $SpaceType=$_POST['SpaceType'];
        $IsMechanical=$_POST['IsMechanical'];
        $HasChargingPoint=$_POST['HasChargingPoint'];
        $NumberOfSpaces=$_POST['NumberOfSpaces'];
        $StayType=$_POST['StayType'];

        $HasInvoice = $_POST['HasInvoice'];
        $InvoiceType_DuplicateUniform = $_POST['InvoiceType_DuplicateUniform'];
        $InvoiceType_TriplicateUniform = $_POST['InvoiceType_TriplicateUniform'];
        $InvoiceSupport_BANPrinted = $_POST['InvoiceSupport_BANPrinted'];
        $InvoiceSupport_Donation = $_POST['InvoiceSupport_Donation'];
        $HasEInvoice = $_POST['HasEInvoice'];
        $HasEInvoiceCarrier = $_POST['HasEInvoiceCarrier'];
        $EInvoiceCarrierType_Generic = $_POST['EInvoiceCarrierType_Generic'];
        $EInvoiceCarrierType_SmartCard = $_POST['EInvoiceCarrierType_SmartCard'];
        $EInvoiceCarrierType_CreditCard = $_POST['EInvoiceCarrierType_CreditCard'];
        $EInvoiceCarrierType_DebitCard = $_POST['EInvoiceCarrierType_DebitCard'];
        $EInvoiceCarrierType_MemberCard = $_POST['EInvoiceCarrierType_MemberCard'];
        $EInvoiceCarrierType_DonationCode = $_POST['EInvoiceCarrierType_DonationCode'];
        $PaymentProcess_PayAndDisplay = $_POST['PaymentProcess_PayAndDisplay'];
        $PaymentProcess_PayByPrepaidToken = $_POST['PaymentProcess_PayByPrepaidToken'];
        $PaymentProcess_PayAtExitBoothManualCollection = $_POST['PaymentProcess_PayAtExitBoothManualCollection'];
        $PaymentProcess_PayAtMachineOnFootPriorToExit = $_POST['PaymentProcess_PayAtMachineOnFootPriorToExit'];
        $PaymentProcess_PayBySmartCard = $_POST['PaymentProcess_PayBySmartCard'];
        $PaymentProcess_PayByMobile = $_POST['PaymentProcess_PayByMobile'];
        $PaymentProcess_PayByEtag = $_POST['PaymentProcess_PayByEtag'];
        $PaymentProcess_Others = $_POST['PaymentProcess_Others'];
        $PaymentMethod_Cash = $_POST['PaymentMethod_Cash'];
        $PaymentMethod_CreditCard = $_POST['PaymentMethod_CreditCard'];
        $PaymentMethod_SmartCard = $_POST['PaymentMethod_SmartCard'];
        $PaymentMethod_ETC = $_POST['PaymentMethod_ETC'];
        $PaymentMethod_MobilePayment = $_POST['PaymentMethod_MobilePayment'];
        $PaymentMethod_Token = $_POST['PaymentMethod_Token'];
        $PaymentMethod_Others = $_POST['PaymentMethod_Others'];
        $SmartCard_EasyCard = $_POST['SmartCard_EasyCard'];
        $SmartCard_IPASS = $_POST['SmartCard_IPASS'];
        $SmartCard_ICash = $_POST['SmartCard_ICash'];
        $SmartCard_HappyCash = $_POST['SmartCard_HappyCash'];
        $PaymentDescription = $_POST['PaymentDescription'];
        $HasTicketingMachine = $_POST['HasTicketingMachine'];
        $TicketingMachine_DisabledFriendly = $_POST['TicketingMachine_DisabledFriendly'];
        $HasTicketingValidator = $_POST['HasTicketingValidator'];
        $TicketingValidatorType_Contactless = $_POST['TicketingValidatorType_Contactless'];
        $TicketingValidatorType_Magnetic = $_POST['TicketingValidatorType_Magnetic'];
        $TicketingValidatorType_NFC = $_POST['TicketingValidatorType_NFC'];
        $TicketingValidatorType_RFID = $_POST['TicketingValidatorType_RFID'];
        $TicketingValidatorType_Others = $_POST['TicketingValidatorType_Others'];


        $insertCarParks="INSERT INTO CarParks (CarParkID,CarParkName_Zh_tw,OperatorID,`Description`,CarParkType,ParkingGuideType,PositionLat,PositionLon,`Address`,FareDescription,IsFreeParkingOutOfHours,
        IsPublic,IsMotorcycle,OperationType,LiveOccupancyAvailable,EVRechargingAvailable,MonthlyTicketAvailable,ReservationAvailable,WheelchairAccessible,OvernightPermitted,TicketMachine,Toilet,Restaurant,GasStation,
        Shop,Gated,Lighting,SecureParking,TicketOffice,ProhibitedForAnyHazardousMaterialLoads,SecurityGuard,Supervision,City,CityCode)
        VALUES ('$CarParkID','$CarParkName_Zh_tw',
            '$OperatorID',
            '$Description',
            '$CarParkType',
            '$ParkingGuideType',
            '$CarParkPosition_PositionLat',
            '$CarParkPosition_PositionLon',
            '$Address',
            '$FareDescription',
            '$IsFreeParkingOutOfHours',
            '$IsPublic',
            '$IsMotorcycle',
            '$OperationType',
            '$LiveOccuppancyAvailable',
            '$EVRechargingAvailable',
            '$MonthlyTicketAvailable',
            -- '$SeasonTicketAvailable',
            '$ReservationAvailable',
            '$WheelchairAccessible',
            '$OvernightPermitted',
            '$TicketMachine',
            '$Toilet',
            '$Restaurant',
            '$GasStation',
            '$Shop',
            '$Gated',
            '$Lighting',
            '$SecureParking',
            '$TicketOffice',
            '$ProhibitedForAnyHazardousMaterialLoads',
            '$SecurityGuard',
            '$Supervision',
            '$City',
            '$CityCode')";

        $insertParkingServiceTime="INSERT INTO ParkingServiceTime (CarParkID,CarParkName_Zh_tw,ServiceDay_ServiceTag,ServiceDay_Monday,ServiceDay_Tuesday,
        ServiceDay_Wednesday,ServiceDay_Thursday,ServiceDay_Friday,ServiceDay_Saturday,ServiceDay_Sunday,ServiceDay_NationalHolidays,`Description`,StartTime,
        EndTime,FreeOfCharge)
        VALUES (
            '$CarParkID','$CarParkName_Zh_tw',
              '$ServiceDay_ServiceTag',
              '$ServiceDay_Monday',
              '$ServiceDay_Tuesday',
              '$ServiceDay_Wednesday',
              '$ServiceDay_Thursday',
              '$ServiceDay_Friday',
             '$ServiceDay_Saturday',
              '$ServiceDay_Sunday',
              '$ServiceDay_NationalHolidays',
              '$ServiceTimeDescription',
             '$StartTime',
              '$EndTime',
             '$FreeOfCharge' )";
        $insertParkingSpace="INSERT INTO ParkingSpace (CarParkID,CarParkName_Zh_tw, TotalSpaces,SpaceType,IsMechanical,HasChargingPoint,NumberOfSpaces,StayType)
        VALUES (
            '$CarParkID','$CarParkName_Zh_tw',
           '$TotalSpaces',
            '$SpaceType',
            '$IsMechanical',
            '$HasChargingPoint',
            '$NumberOfSpaces',
            '$StayType')";

        $insertParkingTicketing="INSERT INTO ParkingTicketing 
        (CarParkID,CarParkName_Zh_tw,HasInvoice,InvoiceType_DuplicateUniform,InvoiceType_TriplicateUniform,InvoiceSupport_BANPrinted,InvoiceSupport_Donation,HasEInvoice,HasEInvoiceCarrier,EInvoiceCarrierType_Generic,
        EInvoiceCarrierType_SmartCard,EInvoiceCarrierType_CreditCard,EInvoiceCarrierType_DebitCard,EInvoiceCarrierType_MemberCard,EInvoiceCarrierType_DonationCode,PaymentProcess_PayAndDisplay,PaymentProcess_PayByPrepaidToken,
        PaymentProcess_PayAtExitBoothManualCollection,PaymentProcess_PayAtMachineOnFootPriorToExit,PaymentProcess_PayBySmartCard, PaymentProcess_PayByMobile,PaymentProcess_PayByEtag,PaymentProcess_Others,PaymentMethod_Cash,
        PaymentMethod_CreditCard,PaymentMethod_SmartCard,PaymentMethod_ETC,PaymentMethod_MobilePayment,PaymentMethod_Token,PaymentMethod_Others,SmartCard_EasyCard,SmartCard_IPASS,SmartCard_ICash,SmartCard_HappyCash,
        PaymentDescription,TicketingMachine_DisabledFriendly,HasTicketingValidator,TicketingValidatorType_Contactless,TicketingValidatorType_Magnetic,TicketingValidatorType_NFC,TicketingValidatorType_RFID,TicketingValidatorType_Others,
        HasTicketingMachine)
        VALUES (
            '$CarParkID','$CarParkName_Zh_tw',
              '$HasInvoice',
              '$InvoiceType_DuplicateUniform',
              '$InvoiceType_TriplicateUniform',
              '$InvoiceSupport_BANPrinted',
              '$InvoiceSupport_Donation',
              '$HasEInvoice',
              '$HasEInvoiceCarrier',
              '$EInvoiceCarrierType_Generic',
              '$EInvoiceCarrierType_SmartCard',
              '$EInvoiceCarrierType_CreditCard',
              '$EInvoiceCarrierType_DebitCard',
              '$EInvoiceCarrierType_MemberCard',
              '$EInvoiceCarrierType_DonationCode',
              '$PaymentProcess_PayAndDisplay',
              '$PaymentProcess_PayByPrepaidToken',
              '$PaymentProcess_PayAtExitBoothManualCollection',
             '$PaymentProcess_PayAtMachineOnFootPriorToExit',
              '$PaymentProcess_PayBySmartCard',
            '$PaymentProcess_PayByMobile',
              '$PaymentProcess_PayByEtag',
              '$PaymentProcess_Others',
              '$PaymentMethod_Cash',
              '$PaymentMethod_CreditCard',
              '$PaymentMethod_SmartCard',
              '$PaymentMethod_ETC',
              '$PaymentMethod_MobilePayment',
              '$PaymentMethod_Token',
              '$PaymentMethod_Others',
              '$SmartCard_EasyCard',
              '$SmartCard_IPASS',
              '$SmartCard_ICash',
              '$SmartCard_HappyCash',
              '$PaymentDescription',
              '$TicketingMachine_DisabledFriendly',
              '$HasTicketingValidator',
              '$TicketingValidatorType_Contactless',
              '$TicketingValidatorType_Magnetic',
              '$TicketingValidatorType_NFC',
              '$TicketingValidatorType_RFID',
              '$TicketingValidatorType_Others',
              '$HasTicketingMachine' )";
        if(mysqli_query($conn, $insertCarParks)&&mysqli_query($conn, $insertParkingServiceTime)&&mysqli_query($conn, $insertParkingSpace)&&mysqli_query($conn, $insertParkingTicketing)){
            echo '修改成功!<br>';
            echo "<a href='admin.php'>返回系統</a>";
            header("refresh:32;url=index.php");
            
        }else{
            echo "Error inserting data to table: " . mysqli_error($conn);
            echo "<a href='admin.php'>返回系統</a>";
        }
}
    



mysqli_close($conn);
exit;
 
?>