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
            height: calc(100vh - 60px);
        }
    </style>
    <title>Maps Lokasi Wisata di Kabupaten Magetan</title>

</head>

<body class="overflow-x-hidden">
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

    {{-- Maps Start --}}
    <div id="map"></div>
    {{-- Maps end --}}

    {{-- Popup Start --}}
    <section
        class="w-1/4 h-[80dvh] absolute top-24 right-4 bg-[#F4FFF0] rounded-3xl z-[999] right-[-25%] shadow-2xl transition-all transition-[.3s] flex flex-col overflow-x-hidden overflow-y-auto "
        id="deskripsi">

        <div class="w-full border-b-2 ">
            <img src="" alt="" id="img" width="100%" height="100%">
        </div>
        <div class="w-full h-1/6 border-b-2 p-4">
            <h1 class="text-2xl font-semibold" id="judul1"></h1>
            <h2 id="jenis"></h2>
        </div>
        <div class="w-full p-4 border-b-2 flex flex-col gap-3">
            <div class="flex gap-2 items-center">
                <img src="feather-icon/map.svg" alt="">
                <p class="text-[12px]" id="alamat"></p>
            </div>
            <div class="flex gap-2 items-center">
                <img src="feather-icon/clock.svg" alt="">
                <p class="text-[12px]" id="jam"></p>
            </div>
            <div class="flex gap-2 items-center">
                <img src="feather-icon/globe.svg" alt="">
                <p class="text-[12px]" id="website"></p>
            </div>
        </div>
        <div class="w-full p-4 border-b-2 flex flex-col gap-3">
            <h1 class="text-xl" id="judul2"></h1>
            <p class="text-[15px] text-justify" id="detil">
            </p>
        </div>
        </div>

    </section>
    {{-- Popup end --}}

</body>
<script>
    var judul1 = document.querySelector("#judul1");
    var jenis = document.querySelector("#jenis");
    var alamat = document.querySelector("#alamat");
    var jam = document.querySelector("#jam");
    var website = document.querySelector("#website");
    var judul2 = document.querySelector("#judul2");
    var detil = document.querySelector("#detil");
    var img = document.querySelector("#img");

    var popupDeskripsi = document.querySelector("#deskripsi");
    var map = L.map("map").setView([-7.662209, 111.354129], 12);

    // Menambahkan layer peta
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);

    // Menambahkan markers lokasi wisata ke peta
    // var titikloaksis = JSON.parse("<?php echo json_encode($titiklokasis); ?>");
    var titikloaksis = {!! json_encode($titiklokasis) !!};
    titikloaksis.forEach((titiklokasi) => {
        var koordinatString = titiklokasi.koordinat;
        var koordinatArray = koordinatString.split(",");
        var latitude = parseFloat(koordinatArray[0]);
        var longitude = parseFloat(koordinatArray[1]);

        var nama = titiklokasi.nama;
        var penjelasan = titiklokasi.penjelasan;
        var id = titiklokasi.id;

        var marker = L.marker([latitude, longitude], {
                id: id,
            })
            .addTo(map)
            .bindPopup(`<b>${nama}</b><br>${penjelasan}`);

        // Menambahkan event click pada marker
        marker.on("click", function() {
            popupDeskripsi.classList.remove("right-[-25%]");
            map.flyTo([latitude, longitude], 13); // Pusatkan peta pada marker yang diklik
            console.log(id);

            judul1.innerText = titiklokasi.nama;
            jenis.innerText = titiklokasi.jenis;
            alamat.innerText = titiklokasi.alamat;
            jam.innerText = titiklokasi.waktu;
            website.innerText = titiklokasi.website;
            judul2.innerText = titiklokasi.nama;
            detil.innerText = titiklokasi.detil;
            img.src = `asset/img.maps/${titiklokasi.foto}`;
        });
    }); // Ini adalah penutup untuk forEach

    // coba buat wisata kuliner start
    // var wisata_kuliners = JSON.parse("<?php echo json_encode($wisata_kuliners); ?>");

    var wisata_kuliners = {!! json_encode($wisata_kuliners) !!};
    wisata_kuliners.forEach((wisata_kuliner) => {
        var koordinatString = wisata_kuliner.koordinat;
        var koordinatArray = koordinatString.split(",");
        var latitude = parseFloat(koordinatArray[0]);
        var longitude = parseFloat(koordinatArray[1]);

        var nama = wisata_kuliner.nama;
        var penjelasan = wisata_kuliner.penjelasan;
        var id = wisata_kuliner.id;

        // menambahkan icon baru
        var greenIcon = L.icon({
            iconUrl: "asset/foodPin2.png",

            iconSize: [40, 40],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -86],
        });

        // menambahkan titik lokasi di maps
        var marker = L.marker(
                [latitude, longitude], {
                    icon: greenIcon,
                }, {
                    id: id,
                }
            )
            .addTo(map)
            .bindPopup(`<b>${nama}</b><br>${penjelasan}`);

        // Menambahkan event click pada marker
        marker.on("click", function() {
            popupDeskripsi.classList.remove("right-[-25%]");
            map.flyTo([latitude, longitude], 13); // Pusatkan peta pada marker yang diklik
            console.log(id);

            judul1.innerText = wisata_kuliner.nama;
            alamat.innerText = wisata_kuliner.alamat;
            jam.innerText = wisata_kuliner.waktu;
            judul2.innerText = wisata_kuliner.nama;
            detil.innerText = wisata_kuliner.detil;
            img.src = `asset/img.maps/${wisata_kuliner.foto}`;
        });
    });

    // coba buat wisata kuliner end

    // Menangani klik pada peta untuk menyembunyikan popup deskripsi
    map.on("click", function() {
        popupDeskripsi.classList.add("right-[-25%]");
    });
</script>

</html>
