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
            <a href="{{ url('/home') }}">
                <img src="asset/img.hero/Logo.png" alt="Magetan" width="100px" /></a>
        </div>
        <div class="menu w-auto">
            <ul>
                <li><a href="{{ url('/home') }}" id="satu" class="satu">Beranda</a></li>

            </ul>
        </div>
    </section>
    {{-- navbar end --}}
    <div id="map"></div>
</body>

<script src="js/maps.js"></script>

</html>
