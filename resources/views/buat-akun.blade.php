<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="pop-up.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <style>
.bg{
    width: 800px;
    height: 555px;
    display: flex;
    margin-top: 50px;
    margin-left: 20%;
    border-radius: 5px;
    background-color: rgba(1, 50, 32, 1);
    }
.pop-up{
    margin-left: auto;
    margin-bottom: 50px;
    display: flexbox;
    width: 455px;
    height: 439px;
    border-radius: 5px;
    background-color: #c9d4c9;
}
.np{
    color: rgba(1, 50, 32, 1);
    font-family: "Poppins", sans-serif;
    font-size: large;
    margin-left: 5%;
    padding: 3%;
}
.info{
    margin-left: 5%;
    margin-top: 20%;
    font-family: "Poppins", sans-serif;
    color: #c7d5c7;
}
.input{
    color: rgba(1, 50, 32, 1);
    font-family: "Poppins", sans-serif;
    margin-left: 15px;
    padding: 10px;
    margin-top: auto;
    margin-right: 10px;
    display: flex;
    flex: 1;
    border-radius: 15px;
}
.pw{
    text-decoration: none;
    color: grey;
    font-family: "Poppins", sans-serif;
    font-size: small;
    padding: 10px;
    margin-right: 15px;
    text-align: right;
    cursor: pointer;
}
.btn-popup{
    background-color: rgba(1, 50, 32, 1);
    border-color: white;
    color: white;
    font-family: "Poppins", sans-serif;
    font-size: larger;
    text-align: center;
    padding: 10px 150px 10px 100px;
    width: 70px;
    display: flex;
    border-radius: 10px;
    cursor: pointer;
    text-decoration: none;
    margin-top: 30px;
    margin-left: 25%;
}
.ket {
    text-decoration: none;
    color: #5b5b5b;
}
.login{
    color: grey;
    font-family: "Poppins", sans-serif;
    font-size: small;
    padding: 10px;
    margin-right: 10px;
    text-align: right;
    cursor: pointer;
}
.cancel{
    color: grey;
    font-family: "Poppins", sans-serif;
    font-size: small;
    padding: 10px;
    margin-top: 10px;
    margin-right: 10px;
    text-align: right;
    cursor: pointer;
}
.alert-box {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 25%;
    padding: 10px;
    background-color: #c9d4c9;
    color: rgba(1, 50, 32, 1);
    border-radius: 5px;
    margin-left: 20%;
    margin-bottom: 5%;
}
</style>
</head>
<body>
    <!-- buat akun start-->
    <div class="bg">
        <div class="info">
            <h1>Hi admin baru</h1>
            <p>Pastikan data diri benar sebelum mengirimnya!</p>
        </div>
        @if ($errors->any())
                <div id="alert-box" class="alert alert-danger alert-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="pop-up">
            <div class="np"> <h1>Buat Akun</h1></div>
            <form action="{{route('buat-akun.post')}}" method="POST" class="pop-up">
                @csrf
                <div class="input">
                    <input type="text" class="input" name="nama_lengkap" placeholder="Nama lengkap" name="nama_lengkap">
                </div>
                <div class="input">
                    <input type="email" class="input" name="alamat_email" placeholder="Alamat email" required name="alamat_email">
                </div>
                <div class="input">
                    <input type="password" class="input" name="password" placeholder="Password" required>
                </div>
                <div class="input">
                    <input type="password" class="input" name="password_confirmation" placeholder="Ketik ulang Password" required>
                </div>
                <div class="input">
                    <input type="text" class="input" name="id_admin" placeholder="ID Admin" required name="id_admin">
                </div>
                <button type="submit" class="btn-popup"> Kirim </button>
                <div class="login">
                    <p><a href="/login" class="ket">Login</a></p>
                </div>
            </form>
    </div>
    </div>
    <!-- buat akun end-->
    </body>
    </html>