var map = L.map("map").setView([-7.662209, 111.354129], 12);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

var saranganMarker = L.marker([-7.67572, 111.22042]).addTo(map);

var wahyuMarker = L.marker([-7.67563, 111.238129]).addTo(map);

var genilangitMarker = L.marker([-7.709753, 111.216796]).addTo(map);

var tirtoMarker = L.marker([-7.709467, 111.188672]).addTo(map);
var klumpitMarker = L.marker([-7.684777, 111.352111]).addTo(map);
L.marker([-7.6309981, 111.2798627]).addTo(map);
L.marker([-7.6231139, 111.3125553]).addTo(map);
L.marker([-7.645878, 111.3831557]).addTo(map);
L.marker([-7.6998981, 111.4333035]).addTo(map);
L.marker([-7.821036, 111.297807]).addTo(map);

var marker = L.marker([-7.722501, 111.3037726], { alt: "Kyiv" })
    .addTo(map) // "Kyiv" is the accessible name of this marker
    .bindPopup("Kyiv, Ukraine is the birthplace of Leaflet!");

saranganMarker
    .bindPopup(
        "<b>Telaga Pasir Sarangan</b><br>Telaga pasir didaerah kabupaten yang menjadi destinasi utama Magetan."
    )
    .openPopup();

klumpitMarker
    .bindPopup("<b>Embung Klumpit</b><br>wisata alam unutk destinasi wisata.")
    .openPopup();
wahyuMarker
    .bindPopup(
        "<b>Telaga Wahyu</b><br>Telaga kecil yang tak kalah indah sebagai object wisata."
    )
    .openPopup();
genilangitMarker
    .bindPopup(
        "<b>Taman Geni Langit</b><br>Destinasi wisata keluiarga yang sangat menyenangkan."
    )
    .openPopup();
tirtoMarker
    .bindPopup(
        "<b>Air Terjun Tirtosari</b><br>Air terjun indah di daerah Magetan."
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
