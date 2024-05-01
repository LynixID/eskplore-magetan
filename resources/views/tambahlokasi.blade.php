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
        <div class="menu w-[12%] flex justify-end">
            <ul>

                <li><a href="{{ url('/maps') }}" id="satu" class="satu">Peta</a></li>
            </ul>
        </div>
    </section>
    {{-- navbar end --}}
</body>

</html>
