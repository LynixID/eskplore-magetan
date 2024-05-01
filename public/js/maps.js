var map = L.map("map").setView([-7.662209, 111.354129], 12);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

var saranganMarker = L.marker([-7.67572, 111.22042]).addTo(map);

var marker = L.marker([-7.722501, 111.3037726], { alt: "Kyiv" })
    .addTo(map) // "Kyiv" is the accessible name of this marker
    .bindPopup("Kyiv, Ukraine is the birthplace of Leaflet!");

saranganMarker
    .bindPopup(
        "<b>Telaga Pasir Sarangan</b><br>Telaga pasir didaerah kabupaten yang menjadi destinasi utama Magetan."
    )
    .openPopup();

function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}

map.on("click", onMapClick);

var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on("click", onMapClick);
