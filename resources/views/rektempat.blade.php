<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Bar with Popup</title>
    <link rel="stylesheet" href="css/rektempat.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
   

        <div class="search-container">
            <input type="text" placeholder="cari lokasi wisata" id="searchInput">
            <div class="popup">
                <div class="popup-content">
                    <span class="close-popup" onclick="closePopup()">&times;</span>
                    <h3 class="recommendation-header">Recommendation</h3>
                    <div class="gambar-info">
                        <div class="gambar-info-item">
                            <img src="asset/rekomendasi/telaga.jpg" alt="Telaga Sarangan">
                            <p class="gambar-caption">Telaga Sarangan</p>
                        </div>
                        <div class="gambar-info-item">
                            <img src="asset/rekomendasi/gunung lawu.jpg" alt="Gunung Lawu">
                            <p class="gambar-caption">Gunung Lawu</p>
                        </div>
                        <div class="gambar-info-item">
                            <img src="asset/rekomendasi/taman wisata genilangit.jpg" alt="Taman Wisata Genilangit">
                            <p class="gambar-caption">Taman Wisata Genilangit</p>
                        </div>
                        <div class="gambar-info-item">
                            <img src="asset/rekomendasi/Air trjun tirtosari.jpg" alt="Air Terjun Tirtosari">
                            <p class="gambar-caption">Air Terjun Tirtosari</p>
                        </div>
                        <div class="gambar-caption">
                            <h4>Top Search</h4>
                            <p class="top-search-paragraph"><a href="#">Cemoro Sewu</a></p>
                            <p class="top-search-paragraph"><a href="#">Mojosemi Forest Park</a></p>
                            <p class="top-search-paragraph"><a href="#">Mbah Djoe Resort</a></p>
                            <p class="top-search-paragraph"><a href="#">Kebun Refugia Magetan</a></p>
                            <p class="top-search-paragraph"><a href="#">Telaga Sarangan</a></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-container">
                <div class="kotak-baru">
                    <h3>Filter</h3>
                    <p>berdasar jenis</p>
                    <p>berdasar wilayah</p>
                </div>
                <div class="kotak-kecil-container">
                    <button class="kotak-kecil">+</button>
                    <button class="kotak-kecil">-</button>
                    <button class="kotak-kecil"><i class="fas fa-map-marker-alt"></i></button>
                </div>
            </div>
        </div>
</body>

</html>
