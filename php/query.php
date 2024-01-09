<?php
include("index_c.php");
global $db_link;

$seldb = mysqli_select_db($db_link, "fp");
if (!$seldb){
    die("chooseing fail");
}

$sql_query1 = "SELECT DISTINCT C1.CarParkName_Zh_tw FROM CarParks C1 ";
$parkty = @$_POST['parkingtype'];
if ($parkty != "") {
    $sql_query1 = $sql_query1." JOIN ParkingSpace PS1 ON (C1.CarParkID = PS1.CarParkID AND C1.CarParkName_Zh_tw = PS1.CarParkName_Zh_tw) ";
}
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

$sql_query1 = $sql_query1." LIMIT 10;";


echo $sql_query1."<br>";

$sql_query2 = "SELECT * FROM CarParks limit 4;";

$result = mysqli_query($db_link, $sql_query1);
// $result = mysqli_query($db_link, $sql_query2);
while($row_result = mysqli_fetch_row($result)){
    foreach($row_result as $item=>$value){
        echo $item.". ".$value."<br />";
    }
    echo "<hr />";
}

?>