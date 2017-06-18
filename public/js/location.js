var map;
var marker;
var uluru = {
    lat: parseFloat(document.getElementById("latitude").value),
    lng: parseFloat(document.getElementById("longitude").value)
};

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: uluru
    });

    marker = new google.maps.Marker({
        position: uluru,
        map: map,
        draggable: true,
    });
}

function askLocation() {
    if (document.location.protocol === 'https:') {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setPositionOnMap, errorGeo);
        }
    }
}

function setPositionOnMap(position) {
    console.info(position);
    marker.setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
    map.panTo(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
}

function errorGeo(position) {
    console.error("Https necesario");
}

initMap();

google.maps.event.addListener(marker, "dragend", function (event) {
    document.getElementById("latitude").value = this.getPosition().lat();
    document.getElementById("longitude").value = this.getPosition().lng();
});

askLocation();
