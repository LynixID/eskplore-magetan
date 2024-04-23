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

saranganMarker
    .bindPopup(
        "<b>Telaga Pasir Sarangan</b><br>Telaga pasir didaerah kabupaten yang menjadi destinasi utama Magetan."
    )
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

// GeoJSON ends
var geojsonFeature = {
    type: "Feature",
    properties: {
        name: "Coors Field",
        amenity: "Baseball Stadium",
        popupContent: "This is where the Rockies play!",
    },
    geometry: {
        type: "Point",
        coordinates: [-7.455071, 111.548162],
    },
};

L.geoJSON(geojsonFeature).addTo(map);

var myLines = [
    {
        type: "LineString",
        coordinates: [
            [-100, 40],
            [-105, 45],
            [-110, 55],
        ],
    },
    {
        type: "LineString",
        coordinates: [
            [-105, 40],
            [-110, 45],
            [-115, 55],
        ],
    },
];

var myLines = [
    {
        type: "LineString",
        coordinates: [
            [-100, 40],
            [-105, 45],
            [-110, 55],
        ],
    },
    {
        type: "LineString",
        coordinates: [
            [-105, 40],
            [-110, 45],
            [-115, 55],
        ],
    },
];

var myStyle = {
    color: "#ff7800",
    weight: 5,
    opacity: 0.65,
};

L.geoJSON(myLines, {
    style: myStyle,
}).addTo(map);

var states = [
    {
        type: "Feature",
        properties: { party: "Republican" },
        geometry: {
            type: "Polygon",
            coordinates: [
                [
                    [-104.05, 48.99],
                    [-97.22, 48.98],
                    [-96.58, 45.94],
                    [-104.03, 45.94],
                    [-104.05, 48.99],
                ],
            ],
        },
    },
    {
        type: "Feature",
        properties: { party: "Democrat" },
        geometry: {
            type: "Polygon",
            coordinates: [
                [
                    [-109.05, 41.0],
                    [-102.06, 40.99],
                    [-102.03, 36.99],
                    [-109.04, 36.99],
                    [-109.05, 41.0],
                ],
            ],
        },
    },
];

L.geoJSON(states, {
    style: function (feature) {
        switch (feature.properties.party) {
            case "Republican":
                return { color: "#ff0000" };
            case "Democrat":
                return { color: "#0000ff" };
        }
    },
}).addTo(map);

var geojsonMarkerOptions = {
    radius: 8,
    fillColor: "#ff7800",
    color: "#000",
    weight: 1,
    opacity: 1,
    fillOpacity: 0.8,
};

L.geoJSON(someGeojsonFeature, {
    pointToLayer: function (feature, latlng) {
        return L.circleMarker(latlng, geojsonMarkerOptions);
    },
}).addTo(map);

function onEachFeature(feature, layer) {
    // does this feature have a property named popupContent?
    if (feature.properties && feature.properties.popupContent) {
        layer.bindPopup(feature.properties.popupContent);
    }
}

var geojsonFeature = {
    type: "Feature",
    properties: {
        name: "Coors Field",
        amenity: "Baseball Stadium",
        popupContent: "This is where the Rockies play!",
    },
    geometry: {
        type: "Point",
        coordinates: [-104.99404, 39.75621],
    },
};

L.geoJSON(geojsonFeature, {
    onEachFeature: onEachFeature,
}).addTo(map);

var someFeatures = [
    {
        type: "Feature",
        properties: {
            name: "Coors Field",
            show_on_map: true,
        },
        geometry: {
            type: "Point",
            coordinates: [-104.99404, 39.75621],
        },
    },
    {
        type: "Feature",
        properties: {
            name: "Busch Field",
            show_on_map: false,
        },
        geometry: {
            type: "Point",
            coordinates: [-104.98404, 39.74621],
        },
    },
];

L.geoJSON(someFeatures, {
    filter: function (feature, layer) {
        return feature.properties.show_on_map;
    },
}).addTo(map);
// GeoJSON ends
