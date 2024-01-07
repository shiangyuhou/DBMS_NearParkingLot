<?php
$servername = "localhost"; // Replace with your MySQL server hostname
$username = "ss"; // Replace with your MySQL username
$password = "ss"; // Replace with your MySQL password
$database = "fp"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// 設定編碼，避免出現亂碼
$conn->query('SET NAMES UTF8');
// 設定成臺灣時區
$conn->query('SET time_zone = "+8:00"');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the SQL query from file
$sqlQuery = "SELECT * FROM CarParks limit 4;";
// Execute the query
$result = $conn->query($sqlQuery);

// Check if the query executed successfully
if ($result) {
    // echo "Query executed successfully\n";
} 
else {
    echo "Error executing query: " . $conn->error;
}
    
// Close the connection
$conn->close();
return $result;
?>
