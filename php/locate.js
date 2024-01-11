var lo, la;
var x = document.getElementById("demo");

function getLocation() {
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
} else {
    x.innerHTML = "該瀏覽器不支援獲取地理位置。";
}
}

function showPosition(position) {
    x.innerHTML = "經度: " + position.coords.longitude + "<br>緯度: " + position.coords.latitude;
    // lo=string(position.coords.longitude);
    // la=string(position.coords.latitude);
    document.getElementById("long").value = position.coords.longitude;
    document.getElementById("lat").value = position.coords.latitude;
    // console.log(lo);

    // Manipulate CSS based on the obtained geolocation
    x.style.color = "blue"; // Change text color to blue
    x.style.fontWeight = "bold"; // Make the text bold
    // Add more CSS properties as needed
}
    
window.onload = function(){
    addMap();
    getLocation();
    map = initialMap();
}; 

// getLocation();