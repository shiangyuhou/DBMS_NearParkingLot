<?php 


$access_token = include('access.php');



$url_arr = ['https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Taoyuan?%24top=2000&%24format=JSON',
'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Kaohsiung?%24top=2000&%24format=JSON',
'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Tainan?%24top=2000&%24format=JSON',
'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/Keelung?%24top=2000&%24format=JSON',
'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/YilanCounty?%24top=2000&%24format=JSON',
'https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingAvailability/City/HualienCounty?%24top=2000&%24format=JSON'];


foreach($url_arr as $url) {
    // curl_URL($url, $access_token);
    update_URL($url, $access_token);
}

function update_URL($url, $access_token){

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
            // $totalSpaces = $data->TotalSpaces;
            $availableSpaces = $data->AvailableSpaces;
            $dataCollectTime = $data->DataCollectTime;
    
            // Prepare SQL statement
            $stmt = $conn->prepare("UPDATE `dynamic`
                                    SET
                                    `AvailableSpaces` = :newAvailableSpaces,
                                    `DataCollectTime` = :newDataCollectTime
                                    WHERE
                                    `CarParkID` = :carParkID AND 
                                    `CarParkName_Zh_tw` = :carParkName;");    
                  
            
            // Bind parameters
            $stmt->bindParam(':carParkID', $carParkID);
            $stmt->bindParam(':carParkName', $carParkName);
            $stmt->bindParam(':newAvailableSpaces', $availableSpaces);
            $stmt->bindParam(':newDataCollectTime', $dataCollectTime);
    
            // Execute the statement
            $stmt->execute();
            echo "1";
        }
    
        echo "Data update successfully";
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close the connection
    $conn = null;

}
?>