<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>


</head>

<body>
    {{-- navbar start --}}
    <section id="navbar">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="asset/img.hero/Logo.png" alt="Magetan" width="100px" /></a>
        </div>
        <div class="menu  w-[7%]">
            <ul>

                <li><a href="{{ url('/maps') }}" id="satu" class="satu">Peta</a></li>
            </ul>
        </div>
    </section>
    {{-- navbar end --}}
    <section class="w-full h-[calc(100dvh-60px)] flex justify-around items-center">
        <div class="w-[25%] h-[80%] bg-[#c7f5b6] text-[#013220] rounded-3xl shadow-lg p-8">
            <h1 class="text-2xl font-bold pb-7">Masukkan Lokasi Baru</h1>
            <form action="/tambahlokasi" method="POST" class="w-full h-full flex flex-col text-xl">
                @csrf
                <label for="nama">Nama Lokasi Wisata:</label>
                <input type="text" id="nama" name="nama" required><br><br>

                <label for="koordinat">Koordinat:</label>
                <input type="text" id="koordinat" name="koordinat" placeholder="Contoh: -7.7894, 110.3633"
                    required><br><br>

                <label for="penjelasan">Penjelasan Lokasi:</label>
                <textarea id="penjelasan" name="penjelasan" rows="4" required></textarea><br><br>

                <button type="submit"
                    class="py-4 bg-green-700 hover:bg-[#013220] transition-all rounded-3xl text-white inline">Submit</button>
            </form>
        </div>
        <div class="w-[65%] h-[80%] bg-[#c7f5b6] text-[#013220] rounded-3xl shadow-lg overflow-y-auto">
            <table class="">
                <tr>
                    <td>Nomor</td>
                    <td>Nama Lokasi</td>
                    <td>Koordinat Lokasi</td>
                    <td>Penjelasan Lokasi</td>
                    <td>Aksi</td>

                </tr>

                @php
                    $no = 1;
                @endphp
                @foreach ($titiklokasis as $titiklokasi)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $titiklokasi->nama }}</td>
                        <td>{{ $titiklokasi->koordinat }}</td>
                        <td>{{ $titiklokasi->penjelasan }}</td>
                        <td style="border: none;">
                            <form action="/tambahlokasi/{{ $titiklokasi->id }}" method="POST"
                                class="py-1 px-2 rounded-xl bg-red-400 text-[#013220] hover:bg-red-600 transition-all">
                                @csrf
                                @method('delete')
                                <button type="submit" value="Delete" class="border-none ">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>

</body>

</html>
