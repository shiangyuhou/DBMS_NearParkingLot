<?php
$conn=require_once("config.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    
    $CarParkID=$_POST["CarParkID"];
    $CarParkName_Zh_tw=$_POST["CarParkName_Zh_tw"];
    //檢查table內是否有該筆資料
    $check="SELECT * FROM carparks WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw' ";
    if(mysqli_num_rows(mysqli_query($conn,$check))==1){
        $sqlCarParks="DELETE FROM carparks WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw' ";
        $sqlParkingServiceTime="DELETE FROM ParkingServiceTime WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw' ";
        $sqlParkingSpace="DELETE FROM ParkingSpace WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw' ";
        $sqlParkingTicketing="DELETE FROM ParkingTicketing WHERE CarParkID='$CarParkID' AND  CarParkName_Zh_tw='$CarParkName_Zh_tw' ";
        if(mysqli_query($conn, $sqlCarParks)&&mysqli_query($conn, $sqlParkingServiceTime)&&mysqli_query($conn, $sqlParkingSpace)&&mysqli_query($conn, $sqlParkingTicketing)){
            echo '刪除成功!<br>';
            echo "<a href='admin.php'>返回系統</a>";
            header("refresh:32;url=index.php");
            exit;
        }else{
            echo "Error deleting table: " . mysqli_error($conn);
        }
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