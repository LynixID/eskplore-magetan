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
    var titikloaksis = JSON.parse("<?php echo json_encode($titiklokasis); ?>");

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
    var titikloaksis = JSON.parse("<?php echo json_encode($titiklokasis); ?>");
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
