var map, marker, lat, lng, newMap, result_json;
var markers = [];

// newMap.addTo(L.map('differentDiv'));
function generateContent(data){
    const collection = document.getElementsByClassName("board__inline");

    const body = document.createElement('div');
    body.classList.add('board__body');

    // <div id="map" style="height: 400px;"></div>
    var mapptr = document.createElement('div');
    mapptr.style.height = "400px";
    mapptr.id="map";

    var boardHr = document.createElement('div');
    boardHr.classList.add('board__hr');

    
    body.appendChild(boardHr);
    body.appendChild(mapptr);
    if(data != null){
        var list = generateCards(data);
    body.appendChild(boardHr);
    body.appendChild(list);
    }
    body.appendChild(boardHr);
    collection[0].appendChild(body);

}

function removeContent(){
    var head = document.querySelector('.board__body');
    // var head = document.querySelector('.board__content');

    while(head.firstChild){
        head.removeChild(head.firstChild);
    }
    head.remove();
}
function submitForm() {
    var formElements  = document.querySelectorAll('#myForm input[type="checkbox"]:checked, #myForm input[type="radio"]:checked, #myForm input[type="text"], #myForm input[type="date"]');
    var formData = new FormData();
    formElements.forEach(function(element) {
            if (element.type === 'checkbox' || element.type === 'radio') {
                formData.append(element.name, element.value);
            }
            else {
                formData.append(element.name, element.value);
            }
    });
    var selectElement = document.getElementById("district");
    var selectedValue = selectElement.value;
    formData.append("zone", selectedValue);
    console.log("zone" + formData.get("zone"));
    console.log("long" + formData.get("long"));

    // Use the Fetch API to make a POST request
    fetch('query.php', {
        method: 'POST',
        body: formData
    })
    // .then(response => response.text())
    .then(response => response.json())
    .then(jsonData => {
        console.log(jsonData);
        removeContent();
        generateContent(jsonData);
        if(map){map.remove();}
        map = initMap(jsonData);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function generateCards(data) {
    // console.log(data);
    // Assuming 'data' is an array of objects with the same structure as your PHP $result
    var list = document.createElement('div');
    list.classList.add('board_list');
    data.forEach(function (row) {
        // var head = document.getElementsByClassName('board_list');
        // const collection = document.getElementsByClassName("board_list");

        var boardHr = document.createElement('div');
        boardHr.classList.add('board__hr');

        // --------------------


        var card = document.createElement('div');
        card.classList.add('card');

        var cardRemain = document.createElement('div');
        cardRemain.classList.add('card__remain');

        // --------------------

        var cardAvatar = document.createElement('div');
        cardAvatar.classList.add('card__avatar');

        var cardBody = document.createElement('div');
        cardBody.classList.add('card__body');

        var cardInfo = document.createElement('div');
        cardInfo.classList.add('card__info');

        var cardContent = document.createElement('p');
        cardContent.classList.add('card__content');

        var carParkIdHeading = document.createElement('h2');
        carParkIdHeading.textContent =  row['CarParkName_Zh_tw'];
        
        var carParkAddress = document.createElement('div');
        carParkAddress.textContent =  row['Address'];

        var carParkPaymentDescription = document.createElement('div');
        carParkPaymentDescription.textContent =  "支援: " + row['PaymentDescription'];

        var cardContent2 = document.createElement('p');
        cardContent2.classList.add('card__content');

        // --------------------

        var cardRemainText = document.createElement('div');
        cardRemainText.classList.add("card_remainText");
        cardRemainText.textContent =  "剩餘車位: ";

        var cardRemainNum = document.createElement('div');
        cardRemainNum.classList.add("card_remainNum");
        cardRemainNum.textContent =  (row['AvailableSpaces'] == null)?"?":row['AvailableSpaces'];

        // --------------------

        // Append elements to the body
        cardBody.appendChild(cardInfo);
        cardBody.appendChild(cardContent);
        cardBody.appendChild(carParkIdHeading);
        cardBody.appendChild(carParkAddress);
        cardBody.appendChild(carParkPaymentDescription);
        cardBody.appendChild(cardContent2);

        cardRemain.appendChild(cardRemainText);
        cardRemain.appendChild(cardRemainNum);

        card.appendChild(cardAvatar);
        card.appendChild(cardBody);
        card.appendChild(cardRemain);

        list.appendChild(card);
        // Append the elements to the document or a container element
        // document.getElementsByClassName('board__content');
        // document.body.appendChild(boardHr);
        // document.body.appendChild(card);
    });
    return list;
}

function initMap1(jsonData) {
    // var initialCoords = (locate != null) ? locate : { lo: 0, la: 0 };
    // Initialize the map using Leaflet and OpenStreetMap
    var newmap;
    navigator.geolocation.watchPosition((position) => {
        console.log(position.coords);
        lat = position.coords.latitude;
        lng = position.coords.longitude;
        newmap = L.map('map').setView([lat, lng], 18);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(newmap);

        // Add markers for each set of coordinates in the jsonData
        jsonData.forEach(function (data) {
            var marker = L.marker([data.PositionLat, data.PositionLon]).addTo(newmap);
            markers.push(marker);
        });
    });
    // map = newmap;

    return newmap;
}

function initMap(jsonData) {
    var initialCoords = jsonData.length > 0 ? jsonData[0] : { PositionLat: 0, PositionLon: 0 };
    // Initialize the map using Leaflet and OpenStreetMap
    var newmap = L.map('map').setView([initialCoords.PositionLat, initialCoords.PositionLon], 18);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(newmap);

    
// function getLocation1() {
//     map.locate({
//         setView: true,
//         enableHighAccuracy: true
//     })
//     .on('locationfound', function(e) {
//         var marker = new L.marker(e.latlng);
//         marker.addTo(map);
//     });
//     }

//     getLocation1(); // Call the function to get the location

    // Add markers for each set of coordinates in the jsonData
    jsonData.forEach(function (data) {
        var marker = L.marker([data.PositionLat, data.PositionLon]).addTo(newmap);
        markers.push(marker);
    });

    // map = newmap;

    return newmap;
}


function addMap(){
    var mapptr_ = document.createElement('div');
    mapptr_.style.height = "400px";
    mapptr_.id="map";
    var body_ = document.getElementsByClassName('board__body');
    body_[0].appendChild(mapptr_);
}

function initialMap() {
    console.log("first time init map");
    if(map){map.remove();}
    navigator.geolocation.watchPosition((position) => {
        console.log(position.coords);
        lat = position.coords.latitude;
        lng = position.coords.longitude;
        
        console.log(lat);
        console.log(lng);
        // Initialize the map using Leaflet and OpenStreetMap
        var newmap = L.map('map').setView([lat, lng], 18);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(newmap);

        // Add a marker to the map
        L.marker([lat, lng]).addTo(newmap);
        // marker.push(marker);

        // map = newmap;
        return newmap;
    });
}