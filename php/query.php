<?php
include("index_c.php");
global $db_link;

$seldb = mysqli_select_db($db_link, "fp");
if (!$seldb){
    die("chooseing fail");
}

$lat = @$_POST["lat"];
$long = @$_POST["long"];

$date = @$_POST["datetime"];
$week = date("l", strtotime($date));

$sql_query1 = "SELECT DISTINCT C1.CarParkName_Zh_tw, C1.PositionLat, C1.PositionLon, C1.Address, PK.PaymentDescription FROM CarParks C1 
                JOIN ParkingTicketing PK ON C1.CarParkID = PK.CarParkID AND C1.CarParkName_Zh_tw = PK.CarParkName_Zh_tw";

$parkty = @$_POST['parkingtype'];
if ($parkty != "") {
    $sql_query1 = $sql_query1." JOIN ParkingSpace PS1 ON (C1.CarParkID = PS1.CarParkID AND C1.CarParkName_Zh_tw = PS1.CarParkName_Zh_tw) ";
}
$zo = @$_POST["zone"];
$sql_query1 = $sql_query1." JOIN ParkingServiceTime PST1 ON (C1.CarParkID = PST1.CarParkID AND C1.CarParkName_Zh_tw = PST1.CarParkName_Zh_tw) ";
$sql_query1 = $sql_query1." WHERE ";

$parkingchar = @$_POST["parkingcharacter"];
switch($parkingchar){
    case "":
        $sql_query1 = $sql_query1."C1.CarParkType < 256 ";
        break;
    case "option1":
        $sql_query1 = $sql_query1."C1.CarParkType < 256 ";
        break;
    case "option2":
        $sql_query1 = $sql_query1."C1.CarParkType = 1 ";
        break;
    case "option3":
        $sql_query1 = $sql_query1."(C1.CarParkType = 2 OR C1.CarParkType = 4 OR C1.CarParkType = 5)";
        break;
    case "option4":
        $sql_query1 = $sql_query1."C1.CarParkType = 3 ";
        break;
}

switch($zo){
    case"基隆市":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"KEE\" ";
        break;
    case"臺北市":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"TPE\" ";
        break;    
    case"桃園市":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"TAO\" ";
        break;
    case"新竹市":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"HSZ\" ";
        break;
    case"苗栗縣":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"MIA\" ";
        break;
    case"臺中市":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"TXG\" ";
        break;
    case"南投縣":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"NAN\" ";
        break;
    case"嘉義縣":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"CYQ\" ";
        break;
    case"嘉義市":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"CYI\" ";
        break;
    case"臺南市":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"TNN\" ";
        break;
    case"高雄市":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"KHH\" ";
        break;
    case"屏東縣":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"PIF\" ";
        break;
    case"臺東縣":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"TTT\" ";
        break;
    case"花蓮縣":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"HUA\" ";
        break;
    case"宜蘭縣":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"ILA\" ";
        break;
    case"金門縣":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"KIN\" ";
        break;
    case"連江縣":
        $sql_query1 = $sql_query1." AND C1.CityCode = \"LIE\" ";
        break;
}


switch($week){
    case "Monday":
        $sql_query1 = $sql_query1." AND PST1.ServiceDay_Monday = 1 ";
        break;
    case "Tuesday":
        $sql_query1 = $sql_query1." AND PST1.ServiceDay_Tuesday = 1 ";
        break;
    case "Wednesday":
        $sql_query1 = $sql_query1." AND PST1.ServiceDay_Wednesday = 1 ";
        break;
    case "Thursday":
        $sql_query1 = $sql_query1." AND PST1.ServiceDay_Thursday = 1 ";
        break;
    case "Friday":
        $sql_query1 = $sql_query1." AND PST1.ServiceDay_Friday = 1 ";
        break;
    case "Saturday":
        $sql_query1 = $sql_query1." AND PST1.ServiceDay_Saturday = 1 ";
        break;
    case "Sunday":
        $sql_query1 = $sql_query1." AND PST1.ServiceDay_Sunday = 1 ";
        break;
}

switch($parkty){
    case "":
        break;
    case "option1":
        $sql_query1 = $sql_query1." AND PS1.SpaceType = 0 ";
        break; 
    case "option2":
        $sql_query1 = $sql_query1." AND (PS1.SpaceType = 0 OR  PS1.SpaceType = 2) ";
        break;        
    case "option3":
        $sql_query1 = $sql_query1." AND (PS1.SpaceType = 0 OR PS1.SpaceType = 1) ";
        break; 
    case "option4":
        $sql_query1 = $sql_query1." AND (PS1.SpaceType = 0 OR PS1.SpaceType = 5) ";
        break;     
    case "option5":
        $sql_query1 = $sql_query1." AND PS1.SpaceType > 5 ";
        break; 
}


/*$parkingsi = @$_POST["parkingsite"];
foreach ($parkingsi as $item){
    if($item == "option1")$sql_query1 = $sql_query1." AND C1.ParkingSiteTypes = 5 ";
    if($item == "option2")$sql_query1 = $sql_query1." AND C1.ParkingSiteTypes = 11 ";
    if($item == "option3")$sql_query1 = $sql_query1." AND C1.ParkingSiteTypes = 7 ";
    if($item == "option4")$sql_query1 = $sql_query1." AND C1.ParkingSiteTypes = 16  ";
    if($item == "option5")$sql_query1 = $sql_query1." AND C1.ParkingSiteTypes = 21  ";
    if($item == "option6")$sql_query1 = $sql_query1." AND C1.ParkingSiteTypes = 254  ";

}*/

$freq = @$_POST["frequency"];
switch($freq){
    case "":
        break;
    case "option1":
        break;
    case "option2":
        $sql_query1 = $sql_query1." AND C1.IsFreeParkingOutOfHOurs = 1 ";
        break;
    case "option3":
        $sql_query1 = $sql_query1." AND C1.MonthlyTicketAvailable = 1 ";
        break;
    case "option4":
        $sql_query1 = $sql_query1." AND C1.SeasonTicketAvailable = 1 ";
        break;
    case "option5":
        $sql_query1 = $sql_query1." AND C1.ReservationAvailable = 1 ";
        break;
}

$safe = @$_POST["safety"];
foreach ($safe as $item){
    if($item == "option1")$sql_query1 = $sql_query1." AND C1.SecurityGuard = 1 ";
    if($item == "option2")$sql_query1 = $sql_query1." AND C1.Supervision = 1 ";
    if($item == "option3")$sql_query1 = $sql_query1." AND C1.SecureParking = 1 ";
    if($item == "option4")$sql_query1 = $sql_query1." AND C1.Gated = 1  ";
}

$facili = @$_POST["facility"];
foreach ($facili as $item){
    if($item == "option1")$sql_query1 = $sql_query1." AND C1.Toilet = 1 ";
    if($item == "option2")$sql_query1 = $sql_query1." AND C1.Restaurant = 1 ";
    if($item == "option3")$sql_query1 = $sql_query1." AND C1.WheelchairAccessible = 1 ";
    if($item == "option4")$sql_query1 = $sql_query1." AND C1.GasStation = 1  ";
    if($item == "option5")$sql_query1 = $sql_query1." AND C1.EVRechargingAvailable = 1  ";
    if($item == "option6")$sql_query1 = $sql_query1." AND C1.TicketMachine = 1  ";
    if($item == "option7")$sql_query1 = $sql_query1." AND C1.Shop = 1  ";
    if($item == "option8")$sql_query1 = $sql_query1." AND C1.TicketOffice = 1  ";
}


$immi = @$_POST["immediatesearch"];
if($immi == "option2")$sql_query1 = $sql_query1." AND C1.LiveOccuppancyAvailable = 1 ";

$lat = (float)$lat;
$long = (float)$long;


$sql_query1 = $sql_query1." ORDER BY ((100 * (C1.PositionLat - ";
$sql_query1 = $sql_query1.$lat;
$sql_query1 = $sql_query1.") * 100 * (C1.PositionLat - ";
$sql_query1 = $sql_query1.$lat;
$sql_query1 = $sql_query1.")) + (111 * (C1.PositionLon - ";
$sql_query1 = $sql_query1.$long;
$sql_query1 = $sql_query1.") * 111 * (C1.PositionLon - ";
$sql_query1 = $sql_query1.$long;
$sql_query1 = $sql_query1."))) ASC LIMIT 10;";


// echo $sql_query1."<br>";

$sql_query2 = "SELECT * FROM CarParks limit 4;";

// $result = mysqli_query($db_link, $sql_query2);
$result = mysqli_query($db_link, $sql_query1);

// echo $result;
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
mysqli_free_result($result);
// mysqli_close($conn);
$jsonData = json_encode($data);
echo $jsonData;

// return 
// echo '<table border="1" style="width: 100%;">';
// echo '<tr><th>停車場名稱</th><th>地址</th><th>收費方式</th></tr>';

// foreach ($data as $item) {
//     echo '<tr>';
//     echo '<td>' . $item['CarParkName_Zh_tw'] . '</td>';
//     echo '<td>' . $item['Address']. '</td>';
//     echo '<td>' . $item['PaymentDescription']. '</td>';
//     echo '</tr>';
//     echo '<br>'; 
// }

// echo '</table>';



// while($row_result = mysqli_fetch_row($result)){
//     foreach($row_result as $item=>$value){
//         echo $item.". ".$value."<br />";
//     }
//     echo "<hr />";
// }

?>