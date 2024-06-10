<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    <link rel="stylesheet" href="css/home.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
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
                <li><a href="{{ url('/maps') }}">Peta</a></li>
            </ul>
        </div>
    </section>
    {{-- navbar end --}}


    {{-- Content Start --}}
    <section class="w-full h-[calc(100dvh-60px)] bg-[#f6fffc] py-5 px-9" id="konten-tabel">
        <div class="w-full h-[80px] flex justify-between font-semibold">
            <div class="flex justify-start items-center gap-7">
                <a href="/lokasiwisata"
                    class="text-lg text-[#025939] hover:text-xl hover:text-[#013220] transition-all">Wisata</a>
                <a href="/lokasikuliner"
                    class="text-lg text-[#025939] hover:text-xl hover:text-[#013220] transition-all">Kuliner</a>
                <h1 class="text-lg text-[#013220] border-b-4 border-[#013220] text xl">Pembelanjaan</h1>
            </div>
            <div class="flex items-center">
                <button class="py-2 px-4 bg-[#21b304] hover:bg-[#126b25] text-white rounded-lg transition-all"
                    id="btn-tambah">
                    Input Data
                </button>
            </div>
        </div>
        <div class="w-full h-full text-sm font-light">
            <table>
                <tr class=" bg-[#126b25] text-center text-white" id="judul-tabel">
                    <td class="">NO</td>
                    <td>Nama</td>
                    <td>Koordinat</td>
                    <td>Alamat</td>
                    <td>Waktu</td>
                    <td>Penjelasan</td>
                    <td>Detail Lokasi</td>
                    <td>Foto</td>
                    <td>Aksi</td>
                </tr>
                @php
                    $no = 1;
                @endphp
                @foreach ($pembelanjaan as $item)
                    <tr id="list-data">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->koordinat }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->waktu }}</td>
                        <td>
                            @php
                                $penjelasan = $item->penjelasan;
                                $shortPenjelasan =
                                    strlen($penjelasan) > 100 ? substr($penjelasan, 0, 100) : $penjelasan;
                            @endphp
                            <span class="short-text">{{ $shortPenjelasan }}</span>
                            @if (strlen($penjelasan) > 100)
                                <span class="full-text" style="display: none;">{{ $penjelasan }}</span>
                                <button class="toggle-btn  font-normal" onclick="toggleText(this)">
                                    Selengkapnya...</button>
                            @endif
                        </td>
                        <td>
                            @php
                                $detil = $item->detil;
                                $shortDetil = strlen($detil) > 100 ? substr($detil, 0, 100) : $detil;
                            @endphp
                            <span class="short-text">{{ $shortDetil }}</span>
                            @if (strlen($detil) > 100)
                                <span class="full-text" style="display: none;">{{ $detil }}</span>
                                <button class="toggle-btn  font-normal" onclick="toggleText(this)">
                                    Selengkapnya...</button>
                            @endif
                        </td>
                        <td>{{ $item->foto }}</td>
                        <td>
                            <form action="{{ Route('hapus.pembelanjaan', $item->id) }}" method="post">
                                @csrf
                                <!-- Hidden input untuk memperolah id -->
                                <input type="submit" value="Hapus"
                                    class="py-2 px-4 bg-red-500 text-white font-medium border-none cursor-pointer hover:bg-red-800 duration-[200ms]">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>

    {{-- Content End --}}

    {{-- Pop up Input Start --}}
    <section
        class="w-full h-[100dvh] bg-[rgba(0,0,0,0.7)] absolute left-0 top-0 flex items-center justify-center pt-8 hidden "
        id="popup">
        <span
            class="block p-3 rounded-full hover:scale-110 border bg-white absolute right-8 top-20 cursor-pointer font-bold text-black transition-all"
            id="x">X</span>
        <div class="w-[85%] h-[75dvh] rounded-xl bg-[#f6fffc] flex justify-between " id="popupNonBg">
            <div class="w-full h-full">
                <div class="w-full text-center h-[100px] text-[2.7rem] flex items-center justify-center">Tambah Data
                    Lokasi</div>
                <div class="w-full h-[calc(100%-48px)] flex justify-between">
                    <form action="/lokasipembelanjaan" method="POST" class="flex w-full h-full justify-between pb-16"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="w-[48%] h-full px-5 py-2 flex flex-col justify-around">
                            <div class="flex flex-col"><label for="nama">Nama Lokasi</label>
                                <input type="text" required id="nama" name="nama">
                            </div>
                            <div class="flex flex-col"><label for="koordinat">Koordinat Lokasi</label>
                                <input type="text" required id="koordinat" name="koordinat">
                            </div>
                            <div class="flex flex-col"><label for="alamat">Alamat</label>
                                <input type="text" required id="alamat" name="alamat">
                            </div>
                            <div class="flex flex-col"><label for="maps">Url Maps</label>
                                <input type="text" required id="maps" name="maps">
                            </div>
                            <div class="flex flex-col"><label for="waktu">Jam Operasi</label>
                                <input type="text" required id="waktu" name="waktu">
                            </div>
                        </div>
                        <div class="w-[48%] h-full px-5 py-2 flex flex-col justify-around">
                            <div class="flex flex-col">
                                <label for="penjelasan">Penjelasan Lokasi</label>
                                <textarea required id="penjelasan" name="penjelasan" class="w-full h-[80px] p-[12px]"></textarea>
                            </div>
                            <div class="flex flex-col"><label for="detil">Detail Penjelasan</label>
                                <textarea required id="detil" name="detil" class="w-full h-[180px] p-[12px]"></textarea>
                            </div>
                            <div class="flex flex-col">
                                <label for="foto">Foto Lokasi</label>
                                <div>
                                    <input type="file" name="foto">
                                    <button type="submit"
                                        class="w-[200px] py-2 bg-[#21b304] text-white ml-6 font-medium rounded-xl text-center mx-auto">Kirim
                                        Data</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    {{-- Pop up Input End --}}

</body>

<script>
    // Fungsi popup tambah data start
    const btn = document.querySelector("#btn-tambah")
    const popup = document.querySelector("#popup")
    const x = document.querySelector("#x")

    btn.addEventListener("click", function() {
        popup.classList.remove("hidden")
    })
    x.addEventListener("click", function() {
        popup.classList.add("hidden")
    })

    // Fungsi popup tambah data End
    // Fungsi Tampilkan Selengkapnya Start

    function toggleText(button) {
        const shortText = button.previousElementSibling.previousElementSibling;
        const fullText = button.previousElementSibling;

        if (shortText.style.display === 'none') {
            shortText.style.display = 'inline';
            fullText.style.display = 'none';
            button.textContent = 'Selengkapnya';
        } else {
            shortText.style.display = 'none';
            fullText.style.display = 'inline';
            button.textContent = 'Lebih Sedikit';
        }
    }
    // DUngsi Tampilkan Selengkapnya End
</script>

</html>
