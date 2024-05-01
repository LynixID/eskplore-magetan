<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Explore Magetan</title>
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
</head>

<body>
    <!-- navbar start -->
    @include('componen.navbar')
    <!-- navbar end -->

    {{-- gradasi hitam start --}}
    <section class="sticky top-0 left-0 right-0 bottom-0 bg-[#00000088] z-10 duration-300" id="gradasi">

        <!-- Pop up login start -->
        {{-- <div class=" w-[350px] h-[500px] bg-[#D9D9D9] absolute top-[100px] right-[150px] z-50 duration-300 rounded-3xl flex flex-col justify-around items-center"
            id="adminLogin">
            <div
                class="w-[100px] h-[100px] bg-[url('asset/iconProfil.png')] bg-cover bg-center absolute top-[-50px] right-[36%] ">
            </div>
            <h1 class="text-[1.7rem] mt-20">Login</h1>
            <form action="" class="w-10/12 h-[60%] flex flex-col justify-center bg-slate-600 px-6 py-8">

                <input type="text" class="my-2">
                <input type="text" class="my-2">
                <input type="text" class="my-2">
            </form>
        </div> --}}
        <!-- pop up login ends -->
    </section>
    {{-- gradasi hitam ends --}}




    <!-- Hero start -->
    <section id="beranda">
        <div class="gradasi"></div>
        <div class="kolom-slogan">
            <h2>Temukan</h2>
            <h2>Destinasi Wisata di</h2>
            <h1>MAGETAN</h1>
        </div>
        <div class="kolom-foto">
            <div class="slideshow1"></div>
            <div class="slideshow2"></div>
            <div class="slideshow3"></div>
            <div class="slideshow4"></div>
            <div class="slideshow5"></div>
        </div>
    </section>
    <!-- hero end -->

    <!-- berita start-->
    @include('componen.berita')
    <!-- berita ends -->

    <!-- peta preview start -->
    <section class="w-full h-[600px] flex justify-evenly items-center" id="peta">
        <div class="w-5/12 h-5/6 flex flex-col items-center text-[#013220]">
            <div class="w-3/4 h-2/5 text-center pt-5">
                <h1 class="text-6xl">Peta Wisata</h1>
                <p class="text-2xl font-medium">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi,
                    quasi.
                </p>
            </div>
            <div class="w-3/4 h-2/5 flex justify-between">
                <div class="w-2/5 h-full">
                    <span
                        class="w-4/5 aspect-square rounded-3xl bg-[url('asset/iconfood.png')] bg-cover block m-auto"></span>
                    <p class="text-center text-[#013220] mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
                <div class="w-2/5 h-full">
                    <span
                        class="w-4/5 aspect-square rounded-3xl bg-[url('asset/iconshop.png')] bg-cover block m-auto"></span>
                    <p class="text-center text-[#013220] mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
            </div>
        </div>
        <div class="w-5/12 h-5/6 flex justify-center items-center">
            <div
                class="petapreview h-[90%] w-[80%] relative bg-[url('asset/petapreview.png')] bg-cover bg-center rounded-[50px] ">
                <a href="{{ url('/maps') }}" class=" w-full h-full absolute top-0 left-0 opacity-0"></a>
                <span class="bg1"></span>
                <span class="bg2"></span>
            </div>
        </div>
    </section>
    <!-- peta preview ends -->

    <!-- feedback Form start -->
    <section class="w-full py-32 flex justify-center ">
        <div
            class="w-9/12 h-[600px] bg-gradient-to-tr from-[#E5FFDC] to-[#B7F9A0] relative overflow-hidden rounded-3xl flex justify-around items-center">
            @include('componen.bgsvg')
            <div class="w-5/12 h-3/4 relative flex flex-col items-end font-normal py-5">
                <h1 class="text-7xl">Feedback</h1>
                <h1 class="text-7xl">Form</h1>
                <p class="w-[250px] text-right text-xl pt-5">Silahkan isi, masukan anda akan sangat membantu kami dalam
                    menyempurnakan project
                    kami..</p>
            </div>
            <div class="w-5/12 h-3/4 bg-white relative rounded-2xl p-5">
                <div class="mb-5">
                    <label for="name" class="text-2xl">Nama Anda :</label>
                    <br>
                    <span class="flex justify-between">
                        <input type="text" class="border border-slate-800 rounded-md py-1 px-3" id="name"
                            placeholder="nama depan">
                        <input type="text" class="border border-slate-800 rounded-md py-1 px-3"
                            placeholder="nama belakang">
                    </span>
                </div>
                <div class="mb-5">
                    <label for="email" class="text-2xl">Email Anda :</label>
                    <br>
                    <input type="email" placeholder="example@gmail.com"
                        class="border border-slate-800 rounded-md py-1 px-3 w-full" id="email">
                </div>
                <div class="mb-5">
                    <label for="komen" class="text-2xl">Masukan :</label>
                    <br>
                    <input type="text" placeholder="kirim pesan pada kami"
                        class="border border-slate-800 rounded-md py-1 px-3 w-full h-[140px]" id="komen">
                </div>
                <div class="w-full flex justify-between">
                    <button class="w-[35%] h-[40px] rounded-2xl text-white bg-red-500 hover:bg-red-700"
                        type="reset">Reset</button>
                    <button class="w-[62%] h-[40px] rounded-2xl text-white  bg-green-700 hover:bg-green-900"
                        type="submit">Submit</button>
                </div>
            </div>


        </div>

    </section>
    {{-- <div class="w-full h-72  bg-slate-600 text-white text-6xl">
        @foreach ($titiklokasis as $titiklokasi)
            <h1>{{ $titiklokasi->koordinat }}</h1>
            <h1>{{ $titiklokasi->nm - wisata }}</h1>
        @endforeach
    </div> --}}
    <!-- feedback form end -->

    {{-- Script Start --}}
    <script src="js/script.js"></script>
    {{-- Script Ends --}}
</body>

</html>
