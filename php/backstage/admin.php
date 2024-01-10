<!DOCTYPE html>
<html lang="zh-tw">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin.css">
  <script>
    function add(){
        document.getElementById("homepage").style.display="none";
        document.getElementById("add").style.display="block";
        document.getElementById("edit").style.display="none";
        document.getElementById("delete").style.display="none";
  
    }
    function srh(){
        document.getElementById("homepage").style.display="none";
        document.getElementById("add").style.display="none";
        document.getElementById("edit").style.display="none";
        document.getElementById("delete").style.display="none";
  
    }
    function edt(){
        document.getElementById("homepage").style.display="none";
        document.getElementById("add").style.display="none";
        document.getElementById("edit").style.display="block";
        document.getElementById("delete").style.display="none";

    }
    function del(){
        document.getElementById("homepage").style.display="none";
        document.getElementById("add").style.display="none";
        document.getElementById("edit").style.display="none";
        document.getElementById("delete").style.display="block";

    }
    
    </script> 
     <style>
        .container {
            display: flex;
            justify-content: space-between; /* 將內容水平分散排列 */
            align-items: center; /* 垂直居中對齊 */
        }

        

        .link {
            
            border-radius: 5px;
            border: 1px solid #c2dffb;
            color: #583c63;
            background: #fff;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
    </style>  
</head>
<body>

  <div id="top">
    <div class="container">
        
            <h1>停車場管理系統</h1>
        
        <div class="link">
            <a href="../index.php" class="link">回首頁</a>
        </div>
    </div>
  </div>

  <div id="bottom">
    <div id="bottom-left">
        <nav class="mdl-navigation">
            <ul><a class="mdl-navigation_link" href="#add" onclick="add();" >新增停車場</a></ul>
            <ul><a class="mdl-navigation_link" href="#edit" onclick="edt();" >編輯停車場</a></ul>
            <ul><a class="mdl-navigation_link" href="#delete" onclick="del();" >刪除停車場</a></ul>
        </nav>
    </div>

    <div id="bottom-right">
        
        <!--在後台的首頁先創建停車場TABLE-->
        <div id="homepage" style="display: block;">
            
                <?php
                    $conn=require_once("../connect.php");
                    //check whether the table has been CREATED
                    $tableName = "CarPark";
                    $check = $conn->query("SHOW TABLES LIKE '$tableName'");
                    if ($check->num_rows > 0) {
                        echo "<h2>Table '$tableName' exists in the database!</h2>";
                    } else {
                        // //query to CREATE table
                        // $sqlCarParks="CREATE TABLE IF NOT EXISTS CarParks ( primary key (CarParkID, CarParkName_Zh_tw),
                        //                     CarParkID VARCHAR(20) NOT NULL,
                        //                     CarParkName_Zh_tw VARCHAR(40) NOT NULL,
                        //                     OperatorID  VARCHAR(20) NOT NULL, 
                        //                     `Description` VARCHAR(255)  NOT NULL,
                        //                     CarParkType INT,
                        //                     ParkingGuideType INT,
                        //                     CarParkPosition_PositionLat DECIMAL(10, 6)  NOT NULL,
                        //                     CarParkPosition_PositionLon DECIMAL(10, 6)  NOT NULL,
                        //                     `Address` VARCHAR(255)  NOT NULL,
                        //                     FareDescription VARCHAR(255),
                        //                     IsFreeParkingOutOfHours TINYINT,
                        //                     IsPublic TINYINT,
                        //                     IsMotorcycle TINYINT,
                        //                     OperationType TINYINT,
                        //                     LiveOccuppancyAvailable TINYINT,
                        //                     EVRechargingAvailable TINYINT,
                        //                     MonthlyTicketAvailable TINYINT,
                        //                     SeasonTicketAvailable TINYINT,
                        //                     ReservationAvailable TINYINT,
                        //                     WheelchairAccessible TINYINT,
                        //                     OvernightPermitted INT,
                        //                     TicketMachine TINYINT,
                        //                     Toilet TINYINT,
                        //                     Restaurant TINYINT,
                        //                     GasStation TINYINT,
                        //                     Shop TINYINT,
                        //                     Gated TINYINT,
                        //                     Lighting TINYINT,
                        //                     SecureParking TINYINT,
                        //                     TicketOffice TINYINT,
                        //                     ProhibitedForAnyHazardousMaterialLoads VARCHAR(20),
                        //                     SecurityGuard TINYINT,
                        //                     Supervision TINYINT,
                        //                     City VARCHAR(255)  NOT NULL,
                        //                     CityCode VARCHAR(255) NOT NULL) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                        // $sqlParkingServiceTime="CREATE TABLE IF NOT EXISTS ParkingServiceTime (
                        //     primary key (CarParkID, CarParkName_Zh_tw),
                        //     CarParkID VARCHAR(20),
                        //     CarParkName_Zh_tw VARCHAR(40),
                        //     ServiceDay_ServiceTag VARCHAR(20),
                        //     ServiceDay_Monday boolean,
                        //     ServiceDay_Tuesday boolean,
                        //     ServiceDay_Wednesday boolean,
                        //     ServiceDay_Thursday boolean,
                        //     ServiceDay_Friday boolean,
                        //     ServiceDay_Saturday boolean,
                        //     ServiceDay_Sunday boolean,
                        //     ServiceDay_NationalHolidays boolean,
                        //     `Description` VARCHAR(40),
                        //     StartTime time,
                        //     EndTime time,
                        //     FreeOfCharge boolean
                        //     -- OpeningHours VARCHAR(10000)
                        // )DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                        // $sqlParkingSpace="CREATE TABLE IF NOT EXISTS ParkingSpace (
                        //     CarParkID VARCHAR(20),
                        //     CarParkName_Zh_tw VARCHAR(40),
                        //     TotalSpaces int,
                        //     SpaceType int,
                        //     IsMechanical boolean,
                        //     HasChargingPoint boolean,
                        //     NumberOfSpaces int,
                        //     StayType int
                        // )DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                        // $sqlParkingTicketing="CREATE TABLE IF NOT EXISTS ParkingTicketing (
                        //     CarParkID VARCHAR(20),
                        //     CarParkName_Zh_tw VARCHAR(40),
                        //     HasInvoice tinyint,
                        //     InvoiceType_DuplicateUniform tinyint,
                        //     InvoiceType_TriplicateUniform tinyint,
                        //     InvoiceSupport_BANPrinted tinyint,
                        //     InvoiceSupport_Donation tinyint,
                        //     HasEInvoice tinyint,
                        //     HasEInvoiceCarrier tinyint,
                        //     EInvoiceCarrierType_Generic tinyint,
                        //     EInvoiceCarrierType_SmartCard tinyint,
                        //     EInvoiceCarrierType_CreditCard tinyint,
                        //     EInvoiceCarrierType_DebitCard tinyint,
                        //     EInvoiceCarrierType_MemberCard tinyint,
                        //     EInvoiceCarrierType_DonationCode tinyint,
                        //     PaymentProcess_PayAndDisplay tinyint,
                        //     PaymentProcess_PayByPrepaidToken tinyint,
                        //     PaymentProcess_PayAtExitBoothManualCollection tinyint,
                        //     PaymentProcess_PayAtMachineOnFootPriorToExit tinyint,
                        //     PaymentProcess_PayBySmartCard tinyint,
                        //     PaymentProcess_PayByMobile tinyint,
                        //     PaymentProcess_PayByEtag tinyint,
                        //     PaymentProcess_Others tinyint,
                        //     PaymentMethod_Cash tinyint,
                        //     PaymentMethod_CreditCard tinyint,
                        //     PaymentMethod_SmartCard tinyint,
                        //     PaymentMethod_ETC tinyint,
                        //     PaymentMethod_MobilePayment tinyint,
                        //     PaymentMethod_Token tinyint,
                        //     PaymentMethod_Others tinyint,
                        //     SmartCard_EasyCard tinyint,
                        //     SmartCard_IPASS tinyint,
                        //     SmartCard_ICash tinyint,
                        //     SmartCard_HappyCash tinyint,
                        //     PaymentDescription VARCHAR(200),
                        //     HasTicketingMachine tinyint,
                        //     TicketingMachine_DisabledFriendly tinyint,
                        //     -- TicketingMachine_Positions tinyint,
                        //     HasTicketingValidator tinyint,
                        //     TicketingValidatorType_Contactless tinyint,
                        //     TicketingValidatorType_Magnetic tinyint,
                        //     TicketingValidatorType_NFC tinyint,
                        //     TicketingValidatorType_RFID tinyint,
                        //     TicketingValidatorType_Others tinyint
                        // )";
                        // if(mysqli_query($conn, $sqlCarParks)&&mysqli_query($conn, $sqlParkingServiceTime)&&mysqli_query($conn, $sqlParkingSpace)&&mysqli_query($conn, $sqlParkingTicketing)){
                        //     echo '<h2>The table successfully CREATED!</h2>';
                            
                        // }else{
                        //     echo "<h2>Error creating table: </h2>" . mysqli_error($conn);
                        // }
                    }
                    mysqli_close($conn);
                    
                ?>
            
        </div>
        
        <!--新增停車場-->
        <div  style="display: none;" id="add">
            <form action="process_add.php" method="post" >
                <h2>新增停車場資料</h2>
                <button type="submit" >匯入內建檔案</button>
            </form>
        </div>
        <!--編輯停車場-->
        <div id="edit" style="display: none;">
            <form action="process_edit.php" method="post">
                <h2>編輯停車場資料</h2>
                <h3>修改停車場資料</h3>
                <label for="CarParkID">CarParkID</label>
                <input type="text" id="CarParkID" style="display: block;" name="CarParkID" required>
                    
                <label for="CarParkName_Zh_tw">CarParkName:</label>
                <input type="text" id="CarParkName_Zh_tw" style="display: block;" name="CarParkName_Zh_tw" required>

                <button type="submit">提交</button>
            </form>
        </div>
        <!--刪除停車場-->
        <div id="delete" style="display: none;">
            <form action="process_delete.php" method="post">
                    <h2>刪除停車場資料</h2>
                    <label for="CarParkID">CarParkID</label>
                    <input type="text" id="CarParkID" style="display: block;" name="CarParkID" required>
                    
                    <label for="CarParkName_Zh_tw">CarParkName:</label>
                    <input type="text" id="CarParkName_Zh_tw" style="display: block;" name="CarParkName_Zh_tw" required>

                    <button type="submit">提交</button>
                </form>
        </div>
        
    </div>    
  </div>
  

</body>
</html>