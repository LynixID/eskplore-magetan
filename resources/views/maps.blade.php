<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- leavlet cdn start --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    {{-- leaflet cdn end --}}
    <!-- font start-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet" />
    <!-- font end -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/home.css" />
    <style>
        body * {
            padding: 0;
            margin: 0;
        }

        #map {
            height: 100vh;
        }
    </style>
    <title>Maps Lokasi Wisata di Kabupaten Magetan</title>

</head>

<body>
    {{-- navbar start --}}
    <section id="navbar">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="asset/img.hero/Logo.png" alt="Magetan" width="100px" /></a>
        </div>
        <div class="menu w-[12%] flex justify-between">
            <ul>
                <li><a href="{{ url('/') }}" id="satu" class="satu">Beranda</a></li>
                <li><a href="{{ url('/tambahlokasi') }}">Tambah</a></li>
            </ul>
        </div>
    </section>
    {{-- navbar end --}}

    <div id="map"></div>
    <div class="w-[700px] h-[200px] bg-slate-500 text-5xll text-white">
        {{-- @foreach ($titiklokasis as $item)
            <h1>{{ $item->nama }}</h1>
            <br>
        @endforeach --}}
    </div>
</body>

<script>
    var map = L.map("map").setView([-7.662209, 111.354129], 12);
    // ======================================
    var titikloaksis = {!! json_encode($titiklokasis) !!};
    titikloaksis.forEach(titiklokasi => {
        // Memisahkan string koordinat menjadi latitude dan longitude
        var koordinatString = titiklokasi.koordinat;
        var koordinatArray = koordinatString.split(',');
        var latitude = parseFloat(koordinatArray[0]);
        var longitude = parseFloat(koordinatArray[1]);

        var nama = titiklokasi.nama;
        var penjelasan = titiklokasi.penjelasan;

        L.marker([latitude, longitude]).addTo(map)
            .bindPopup(
                `<b>${nama}</b><br>${penjelasan}`
            )
            .openPopup();

    });

    // ==========================================================================


    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);

    var saranganMarker = L.marker([-7.679517, 111.292229]).addTo(map);

    saranganMarker
        .bindPopup(
            "<b>Sumberagung camp</b><br>Buat nyoba aja sih ini"
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
</script>

</html>
