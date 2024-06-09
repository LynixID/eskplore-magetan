<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Admin</title>
    <link rel="stylesheet" href="{{ asset('css/berandaadmin.css') }}">
</head>
<body>
    <div class="navbar">
        <img src="{{ asset('asset/img.beranda/Logo.png') }}" alt="Logo" class="logo">
        <a href="#" class="text right-link">Logout</a>
    </div>
    <div class="container">
        <a href="feedback" class="container-link">
            <div class="small-box">
                <img src="{{ asset('asset/img.beranda/BackgroundEraser_20240328_215034651.png') }}" alt="Icon 1">
            </div>
            <p class="text" style="text-align: center;">Lihat Feedback</p>
        </a>
        <a href="maps" class="container-link">
            <div class="small-box">
                <img src="{{ asset('asset/img.beranda/BackgroundEraser_20240328_215059491.png') }}" alt="Icon 2">
            </div>
            <p class="text" style="text-align: center;">Edit Map</p>
        </a>
    </div>
</body>
</html>
