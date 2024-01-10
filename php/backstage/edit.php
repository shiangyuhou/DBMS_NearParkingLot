<?php
$conn=require_once("config.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    
    $originCarParkID=$_POST["originCarParkID"];
    $originCarParkName_Zh_tw=$_POST["originCarParkName_Zh_tw"];
    
    //檢查table內是否有該筆資料
    $check="SELECT * FROM carparks WHERE CarParkID='$originCarParkID' AND  CarParkName_Zh_tw='$originCarParkName_Zh_tw'";
    if(mysqli_num_rows(mysqli_query($conn,$check))>0){
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


        $updateCarParks="UPDATE CarParks SET CarParkID='$CarParkID',CarParkName_Zh_tw='$CarParkName_Zh_tw',
            OperatorID='$OperatorID',
            `Description`='$Description',
            CarParkType='$CarParkType',
            ParkingGuideType='$ParkingGuideType',
            CarParkPosition_PositionLat='$CarParkPosition_PositionLat',
            CarParkPosition_PositionLon='$CarParkPosition_PositionLon',
            `Address`='$Address',
            FareDescription='$FareDescription',
            IsFreeParkingOutOfHours='$IsFreeParkingOutOfHours',
            IsPublic='$IsPublic',
            IsMotorcycle='$IsMotorcycle',
            OperationType='$OperationType',
            LiveOccuppancyAvailable='$LiveOccuppancyAvailable',
            EVRechargingAvailable='$EVRechargingAvailable',
            MonthlyTicketAvailable='$MonthlyTicketAvailable',
            SeasonTicketAvailable='$SeasonTicketAvailable',
            ReservationAvailable='$ReservationAvailable',
            WheelchairAccessible='$WheelchairAccessible',
            OvernightPermitted='$OvernightPermitted',
            TicketMachine='$TicketMachine',
            Toilet='$Toilet',
            Restaurant='$Restaurant',
            GasStation='$GasStation',
            Shop='$Shop',
            Gated='$Gated',
            Lighting='$Lighting',
            SecureParking='$SecureParking',
            TicketOffice='$TicketOffice',
            ProhibitedForAnyHazardousMaterialLoads='$ProhibitedForAnyHazardousMaterialLoads',
            SecurityGuard='$SecurityGuard',
            Supervision='$Supervision',
            City='$City',
            CityCode='$CityCode'
            WHERE CarParkID='$originCarParkID' AND  CarParkName_Zh_tw='$originCarParkName_Zh_tw'";

        $updateParkingServiceTime="UPDATE ParkingServiceTime SET
            CarParkID='$CarParkID',CarParkName_Zh_tw='$CarParkName_Zh_tw',
            ServiceDay_ServiceTag = '$ServiceDay_ServiceTag',
            ServiceDay_Monday = '$ServiceDay_Monday',
            ServiceDay_Tuesday = '$ServiceDay_Tuesday',
            ServiceDay_Wednesday = '$ServiceDay_Wednesday',
            ServiceDay_Thursday = '$ServiceDay_Thursday',
            ServiceDay_Friday = '$ServiceDay_Friday',
            ServiceDay_Saturday = '$ServiceDay_Saturday',
            ServiceDay_Sunday = '$ServiceDay_Sunday',
            ServiceDay_NationalHolidays = '$ServiceDay_NationalHolidays',
            `Description` = '$ServiceTimeDescription',
            StartTime = '$StartTime',
            EndTime = '$EndTime',
            FreeOfCharge = '$FreeOfCharge' WHERE CarParkID='$originCarParkID' AND  CarParkName_Zh_tw='$originCarParkName_Zh_tw'
        ";
        $updateParkingSpace="UPDATE ParkingSpace SET
            CarParkID='$CarParkID',CarParkName_Zh_tw='$CarParkName_Zh_tw',
            TotalSpaces='$TotalSpaces',
            SpaceType='$SpaceType',
            IsMechanical='$IsMechanical',
            HasChargingPoint='$HasChargingPoint',
            NumberOfSpaces='$NumberOfSpaces',
            StayType='$StayType'
            WHERE CarParkID='$originCarParkID' AND  CarParkName_Zh_tw='$originCarParkName_Zh_tw'
        ";

        $updateParkingTicketing="UPDATE Parkingticketing SET
            CarParkID='$CarParkID',CarParkName_Zh_tw='$CarParkName_Zh_tw',
            HasInvoice = '$HasInvoice',
            InvoiceType_DuplicateUniform = '$InvoiceType_DuplicateUniform',
            InvoiceType_TriplicateUniform = '$InvoiceType_TriplicateUniform',
            InvoiceSupport_BANPrinted = '$InvoiceSupport_BANPrinted',
            InvoiceSupport_Donation = '$InvoiceSupport_Donation',
            HasEInvoice = '$HasEInvoice',
            HasEInvoiceCarrier = '$HasEInvoiceCarrier',
            EInvoiceCarrierType_Generic = '$EInvoiceCarrierType_Generic',
            EInvoiceCarrierType_SmartCard = '$EInvoiceCarrierType_SmartCard',
            EInvoiceCarrierType_CreditCard = '$EInvoiceCarrierType_CreditCard',
            EInvoiceCarrierType_DebitCard = '$EInvoiceCarrierType_DebitCard',
            EInvoiceCarrierType_MemberCard = '$EInvoiceCarrierType_MemberCard',
            EInvoiceCarrierType_DonationCode = '$EInvoiceCarrierType_DonationCode',
            PaymentProcess_PayAndDisplay = '$PaymentProcess_PayAndDisplay',
            PaymentProcess_PayByPrepaidToken = '$PaymentProcess_PayByPrepaidToken',
            PaymentProcess_PayAtExitBoothManualCollection = '$PaymentProcess_PayAtExitBoothManualCollection',
            PaymentProcess_PayAtMachineOnFootPriorToExit ='$PaymentProcess_PayAtMachineOnFootPriorToExit',
            PaymentProcess_PayBySmartCard = '$PaymentProcess_PayBySmartCard',
            PaymentProcess_PayByMobile = '$PaymentProcess_PayByMobile',
            PaymentProcess_PayByEtag = '$PaymentProcess_PayByEtag',
            PaymentProcess_Others = '$PaymentProcess_Others',
            PaymentMethod_Cash = '$PaymentMethod_Cash',
            PaymentMethod_CreditCard = '$PaymentMethod_CreditCard',
            PaymentMethod_SmartCard = '$PaymentMethod_SmartCard',
            PaymentMethod_ETC = '$PaymentMethod_ETC',
            PaymentMethod_MobilePayment = '$PaymentMethod_MobilePayment',
            PaymentMethod_Token = '$PaymentMethod_Token',
            PaymentMethod_Others = '$PaymentMethod_Others',
            SmartCard_EasyCard = '$SmartCard_EasyCard',
            SmartCard_IPASS = '$SmartCard_IPASS',
            SmartCard_ICash = '$SmartCard_ICash',
            SmartCard_HappyCash = '$SmartCard_HappyCash',
            PaymentDescription = '$PaymentDescription',
            TicketingMachine_DisabledFriendly = '$TicketingMachine_DisabledFriendly',
            HasTicketingValidator = '$HasTicketingValidator',
            TicketingValidatorType_Contactless = '$TicketingValidatorType_Contactless',
            TicketingValidatorType_Magnetic = '$TicketingValidatorType_Magnetic',
            TicketingValidatorType_NFC = '$TicketingValidatorType_NFC',
            TicketingValidatorType_RFID = '$TicketingValidatorType_RFID',
            TicketingValidatorType_Others = '$TicketingValidatorType_Others',
            HasTicketingMachine = '$HasTicketingMachine' WHERE CarParkID='$originCarParkID' AND  CarParkName_Zh_tw='$originCarParkName_Zh_tw'
        ";
        if(mysqli_query($conn, $updateCarParks)&&mysqli_query($conn, $updateParkingServiceTime)&&mysqli_query($conn, $updateParkingSpace)&&mysqli_query($conn, $updateParkingTicketing)){
            echo '修改成功!<br>';
            echo "<a href='admin.php'>返回系統</a>";
            header("refresh:32;url=index.php");
            
        }else{
            echo "Error deleting table: " . mysqli_error($conn);
            echo "<a href='admin.php'>返回系統</a>";
        }
    }
    else{
        echo "查無該筆資料<br>";
        echo "<a href='admin.php'>返回系統</a>";
        header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        
    }
}


mysqli_close($conn);
exit;
 
?>