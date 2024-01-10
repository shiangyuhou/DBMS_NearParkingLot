<?php
$conn=require_once("config.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $tableName = "CarParks";
    $check = $conn->query("SHOW TABLES LIKE '$tableName'");
    if ($check->num_rows > 0) {
        // 使用 LOAD DATA INFILE 导入数据 ※csv必須存入MySQL的存取位置
        $sqlCarParks ="LOAD DATA INFILE 'CarPark_output.csv'
        INTO TABLE CarParks
        FIELDS TERMINATED BY ',' 
        OPTIONALLY ENCLOSED BY '\"'
        LINES TERMINATED BY '\n'
        IGNORE 1 ROWS"; 
        $sqlParkingServiceTime ="LOAD DATA INFILE 'ParkingServiceTime_output.csv'
        INTO TABLE ParkingServiceTime
        FIELDS TERMINATED BY ',' 
        OPTIONALLY ENCLOSED BY '\"'
        LINES TERMINATED BY '\n'
        IGNORE 1 ROWS";
        $sqlParkingSpace ="LOAD DATA INFILE 'ParkingSpace_output.csv'
        INTO TABLE ParkingSpace
        FIELDS TERMINATED BY ',' 
        OPTIONALLY ENCLOSED BY '\"'
        LINES TERMINATED BY '\n'
        IGNORE 1 ROWS";
        $sqlParkingTicketing ="LOAD DATA INFILE 'ParkingTicketing_output.csv'
        INTO TABLE ParkingTicketing
        FIELDS TERMINATED BY ',' 
        OPTIONALLY ENCLOSED BY '\"'
        LINES TERMINATED BY '\n'
        IGNORE 1 ROWS";
        $duplicate=$conn->query("SELECT * FROM CarParks");
        if($duplicate->num_rows > 0){
            echo '檔案已匯入!<br>';
            echo "<a href='admin.php'>返回系統</a>";
        }else{
            if(mysqli_query($conn, $sqlCarParks)&&mysqli_query($conn, $sqlParkingServiceTime)&&mysqli_query($conn, $sqlParkingSpace)&&mysqli_query($conn, $sqlParkingTicketing)){
                echo '新增成功!<br>';
                echo "<a href='admin.php'>返回系統</a>";
                header("refresh:32;url=index.php");
            }else{
                echo "Error adding table: <br>" . mysqli_error($conn);
                echo "<a href='admin.php'>返回系統</a>";
            }
        }
        
    } else {
        echo "The table hasn't been created!Please create first<br>";
        echo "<a href='admin.php'>返回系統</a>";
    }
    
}
mysqli_close($conn);

?>