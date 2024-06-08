<section class="w-full h-[100dvh] bg-[rgba(0,0,0,0.7)] absolute left-0 top-0 flex items-end justify-center pb-8 hidden"
    id="popup">
    <span
        class="block p-3 rounded-full hover:scale-110 border bg-white absolute right-8 top-20 cursor-pointer font-bold text-black transition-all"
        id="x">X</span>
    <div class="w-[85%] h-[85dvh]  bg-[#f6fffc] flex justify-between " id="popupNonBg">
        <div class="w-full h-full">
            <div class="w-full text-center h-[100px] text-[2.7rem] flex items-center justify-center">Tambah Data
                Lokasi</div>
            <div class="w-full h-[calc(100%-48px)] flex justify-between">
                <div class="w-[47%] h-full py-6 px-10 ">
                    <form action="/lokasiwisata" method="POST"
                        class="flex w-full h-full flex-col justify-between pb-16">
                        @csrf
                        <div class="flex flex-col"><label for="nama">Nama Lokasi</label>
                            <input type="text" id="nama" name="nama">
                        </div>
                        <div class="flex flex-col"><label for="jenis">Jenis Lokasi</label>
                            <select name="jenis" id="jenis">
                                <option value="Wisata Alam">Wisata Alam</option>
                                <option value="Wisata Buatan">Wisata Buatan</option>
                            </select>
                        </div>
                        <div class="flex flex-col"><label for="koordinat">Koordinat Lokasi</label>
                            <input type="text" id="koordinat" name="koordinat">
                        </div>
                        <div class="flex flex-col"><label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat">
                        </div>
                        <div class="flex flex-col"><label for="waktu">Jam Operasi</label>
                            <input type="text" id="waktu" name="waktu">
                        </div>
                        <div class="flex flex-col"><label for="website">Website</label>
                            <input type="text" id="website" name="website">
                        </div>
                    </form>
                </div>
                <div class="w-[47%] h-full py-6 px-10  ">
                    <form action="/lokasiwisata" method="POST"
                        class="w-full h-full flex flex-col justify-between pb-16">
                        @csrf
                        <div class="flex flex-col">
                            <label for="penjelasan">Penjelasan Lokasi</label>
                            <input type="text" id="penjelasan" name="penjelasan" class="w-full h-[80px]">
                        </div>
                        <div class="flex flex-col">
                            <label for="detil">Detail Penjelasan</label>
                            <input type="text" id="detil" name="detil" class="w-full h-[180px]">
                        </div>
                        <div class="flex flex-col">
                            <label for="foto">Foto Lokasi</label>
                            <input type="file" name="foto">
                        </div>
                        <button type="submit"
                            class="w-[130px] py-2 bg-[#21b304] text-white font-medium rounded-xl text-center mx-auto">Kirim
                            Data</button>
                    </form>

                </div>
            </div>

        </div>

    </div>

</section>
