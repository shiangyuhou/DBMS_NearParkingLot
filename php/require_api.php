<?php

// 取得 Access Token
// $client_id = 'shiangyu.mg09-d4f96dda-463b-4057';
// $client_secret = '386efa68-cd3f-4976-b28f-b029ba9f375d';

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://tdx.transportdata.tw/auth/realms/TDXConnect/protocol/openid-connect/token');
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id='.$client_id.'&client_secret='.$client_secret);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $result = curl_exec($ch);
// curl_close($ch);

// $access_token = json_decode($result,1)['access_token'];
$access_token = include('access.php');

// 測試：取得新北市公車到站資料
// https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Taoyuan?%24top=2000&%24format=JSON
// https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Kaohsiung?%24top=2000&%24format=JSON
// https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Tainan?%24top=2000&%24format=JSON
// https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Keelung?%24top=2000&%24format=JSON
// https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/YilanCounty?%24top=2000&%24format=JSON
// https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/HualienCounty?%24top=2000&%24format=JSON

$url_arr = ['https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Taoyuan?%24top=2000&%24format=JSON',
    'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Kaohsiung?%24top=2000&%24format=JSON',
    'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Tainan?%24top=2000&%24format=JSON',
    'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Keelung?%24top=2000&%24format=JSON',
    'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/YilanCounty?%24top=2000&%24format=JSON',
    'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/HualienCounty?%24top=2000&%24format=JSON'];

foreach($url_arr as $url) {
    curl_URL($url, $access_token);
    // update_URL($url, $access_token);
}
function curl_URL($url, $access_token){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('authorization: Bearer '.$access_token));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $busEstimatedTime = curl_exec($ch);
    curl_close($ch);
    // print_r($busEstimatedTime);
    $result_data = json_decode($busEstimatedTime);
    // print_r($result_data);
    $result_arr = $result_data->ParkingAvailabilities;
    // print_r($result_arr);
    // return $result_arr;
    
    try {
        // Create connection
        $servername = "localhost";
        $username = "ss";
        $password = "ss";
        $dbname = "fp";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //         "INSERT INTO `dynamic` (CarParkID, CarParkName_Zh_tw, TotalSpaces, AvailableSpaces, DataCollectTime) 
        //                                     VALUES (:carParkID, :carParkName, :totalSpaces, :availableSpaces, :dataCollectTime)"
        // this is insert query, help me write a update query to update the AvailableSpaces and DataCollectTime with same CarParkID
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Iterate through the array and insert data into the database
        foreach ($result_arr as $data) {
            $carParkID = $data->CarParkID;
            $carParkName = $data->CarParkName->Zh_tw;
            $totalSpaces = $data->TotalSpaces;
            $availableSpaces = $data->AvailableSpaces;
            $dataCollectTime = $data->DataCollectTime;
            
            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO `dynamic` (CarParkID, CarParkName_Zh_tw, TotalSpaces, AvailableSpaces, DataCollectTime) 
                                    VALUES (:carParkID, :carParkName, :totalSpaces, :availableSpaces, :dataCollectTime)");
                  
            
            // Bind parameters
            $stmt->bindParam(':carParkID', $carParkID);
            $stmt->bindParam(':carParkName', $carParkName);
            $stmt->bindParam(':totalSpaces', $totalSpaces);
            $stmt->bindParam(':availableSpaces', $availableSpaces);
            $stmt->bindParam(':dataCollectTime', $dataCollectTime);
    
            // Execute the statement
            // print("test0");
            $stmt->execute();

        }
    
        echo "Data inserted successfully";
        $conn = null;
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close the connection

}


// return $access_token;

    // $data = array();
// print_r($result_arr);
// for( $i = 0; $i < count($result_arr); $i++ ){
//     // data[] = 
//     CarParkID, CarParkName, TotalSpaces, Availabilities->AvailableSpaces
// }



// Assuming $dataArray is your provided array

// Database connection parameters


// try {
//     // Create connection
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
//     // Set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // Iterate through the array and insert data into the database
//     foreach ($result_arr as $data) {
//         $carParkID = $data->CarParkID;
//         $carParkName = $data->CarParkName->Zh_tw;
//         $totalSpaces = $data->TotalSpaces;
//         $availableSpaces = $data->AvailableSpaces;
//         $dataCollectTime = $data->DataCollectTime;

//         // Prepare SQL statement
//         $stmt = $conn->prepare("INSERT INTO `dynamic` (CarParkID, CarParkName_Zh_tw, TotalSpaces, AvailableSpaces, DataCollectTime) 
//                                 VALUES (:carParkID, :carParkName, :totalSpaces, :availableSpaces, :dataCollectTime)");

//         // Bind parameters
//         $stmt->bindParam(':carParkID', $carParkID);
//         $stmt->bindParam(':carParkName', $carParkName);
//         $stmt->bindParam(':totalSpaces', $totalSpaces);
//         $stmt->bindParam(':availableSpaces', $availableSpaces);
//         $stmt->bindParam(':dataCollectTime', $dataCollectTime);

//         // Execute the statement
//         $stmt->execute();
//         echo "1";
//     }

//     echo "Data inserted successfully";

// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

// // Close the connection
// $conn = null;



// $conn = include("connect.php");
// foreach ($result_arr as $data) {
//     $carParkID = $data->CarParkID;
//     $carParkName = $data->CarParkName->Zh_tw;
//     $totalSpaces = $data->TotalSpaces;
//     $availableSpaces = $data->AvailableSpaces;
//     $dataCollectTime = $data->DataCollectTime;

//     // Prepare SQL statement
//     $stmt = $conn->prepare("INSERT INTO `dynamic` (CarParkID, CarParkName, TotalSpaces, AvailableSpaces, DataCollectTime) 
//                             VALUES (:carParkID, :carParkName, :totalSpaces, :availableSpaces, :dataCollectTime)");

//     // Bind parameters
//     $stmt->bindParam(':carParkID', $carParkID);
//     $stmt->bindParam(':carParkName', $carParkName);
//     $stmt->bindParam(':totalSpaces', $totalSpaces);
//     $stmt->bindParam(':availableSpaces', $availableSpaces);
//     $stmt->bindParam(':dataCollectTime', $dataCollectTime);

//     // Execute the statement
//     $stmt->execute();
// }

// mysqli_close($conn);

// $rtn = print_r($result_data, true);
// print_r($rtn);
// foreach ($rtn as $key => $value) {
//     echo '<tr>';
//     echo '<td>' . htmlspecialchars($key) . '</td>';
//     echo '<td>' . htmlspecialchars($value) . '</td>';
//     echo '</tr>';
// }
// echo $rtn;

// print_r($result_data, true);
// print_r($result_data[0]['TotalSpaces']);






?>