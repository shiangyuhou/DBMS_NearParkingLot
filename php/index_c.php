<?php
$db_host = "localhost";
$db_username = "ss";
$db_password = "ss";
// $db_database = "fp";
// $db_link = mysqli_connect($db_host, $db_username, $db_password, $db_database);
$db_link = mysqli_connect($db_host, $db_username, $db_password);
if (!$db_link)die("failing now");
mysqli_query($db_link, "SET NAMES 'utf8'");
?>
