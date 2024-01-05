<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/nevigator.css">

    <!-- Open Street Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <title>Login Form</title>
</head>


<body>
<main>
<div class="board__header">
    <div class="border__word-block">
        <h1 class="board__tittle">DBMS_NearParkingLot</h1>
    </div>
    <div class="board__btn-block">
            <a class="board__btn" href="register.php">Sign up</a>
        <a class="board__btn" href="login.php">Log in</a>
        
    </div>

</div>

<div class="board__content"> 

<!-- <div class="board__map"></div> -->
<div class="board__nevigator">
    <div class="board__btn-block">
        <a class="board__btn" href="register.php">找即時</a>
        <a class="board__btn" href="login.php">找充電</a>
        <a class="board__btn" href="login.php">找月租</a>
        <a class="board__btn" href="login.php">找其他</a>
    </div>

</div>
<div id="map" style="height: 400px;"></div>

    <!-- init Map -->
    <script>
        var map, marker, lat, lng;

        function initMap() {
            navigator.geolocation.watchPosition((position) => {
                console.log(position.coords);
                lat = position.coords.latitude;
                lng = position.coords.longitude;
                
                console.log(lat);
                console.log(lng);
                // Initialize the map using Leaflet and OpenStreetMap
                map = L.map('map').setView([lat, lng], 18);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                // Add a marker to the map
                marker = L.marker([lat, lng]).addTo(map);
            });
        }
        initMap();
    </script>

<div class="board__hr"></div>

<?php require_once("content.php"); ?>

<div class="board__hr"></div>

<!-- map + list -->
</div>



</main>
</body>
</html>
