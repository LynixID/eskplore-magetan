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
.buat-akun{
    color: grey;
    font-family: "Poppins", sans-serif;
    font-size: small;
    padding: 10px;
    margin-top: 10px;
    text-align: center;
    cursor: pointer;
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
</style>
</head>
<body>
    <!-- buat akun start-->
    <div class="bg">
        <div class="info">
            <h1>Hi admin baru</h1>
            <p>Pastikan data diri benar sebelum mengirimnya!</p>
        </div>
        <div class="pop-up">
            <div class="np"> <h1>Buat Akun</h1></div>
                <form action="{{route('buat-akun.post')}}" method="POST" class="pop-up">
                    @csrf
                    <div class="input">
                        <input type="text" class="input" name="nama_depan" placeholder="Nama depan" name="nama_depan">
                        <input type="text" class="input" name="nama_belakang" placeholder="Nama belakang" name=
                        "nama_belakang">
                    </div>
                    <div class="input">
                        <input type="email" class="input" name="alamat_email" placeholder="Alamat email" required name="alamat_email">
                    </div>
                    <div class="input">
                        <input type="password" class="input" name="password" placeholder="Password" required name="password">
                    </div>
                    <div class="input">
                        <input type="password" class="input" placeholder="Ketik ulang Password" required>
                    </div>
                    <div class="input">
                        <input type="text" class="input" name="id_admin" placeholder="ID Admin" required name="id_admin">
                    </div>
                    <div class="input">
                        <input type="text" class="input" name="kode_aktivasi" placeholder="Kode Aktivasi" required name="kode_aktivasi">
                    </div>
                    <button type="submit" class="btn-popup"> Kirim </button>
                </form>
            <div class="login">
                <p><a href="/login" class="ket">Login</a></p>
            </div>
        </div>
    </div>
    <!-- buat akun end-->
</body>
</html>
