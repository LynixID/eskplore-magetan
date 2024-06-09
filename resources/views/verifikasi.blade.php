<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="pop-up.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Verifikasi password</title>
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
    display: absolute;
    margin-left: auto;
    margin-bottom: 50px;
    width: 455px;
    height: 555px;
    border-radius: 5px;
    background-color: #c9d4c9;
}
.np{
    color: rgba(1, 50, 32, 1);
    font-family: "Poppins", sans-serif;
    font-size: large;
    margin-top: 50px;
    margin-left: 5%;
    padding: 3%;
}
.info{
    margin-left: 5%;
    margin-top: 20%;
    font-family: "Poppins", sans-serif;
    color: #c7d5c7;
}
.isi{
    padding: 0%;
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
    padding: 10px 100px 10px 100px;
    width: 100px;
    border-radius: 10px;
    cursor: pointer;
    text-decoration: none;
    margin-left: 30%;
}
.btn-verif{
    background-color: rgba(1, 50, 32, 1);
    border-color: white;
    color: white;
    font-family: "Poppins", sans-serif;
    font-size: small;
    border-radius: 10px;
    padding: 10px 10px 10px 10px;
    margin-left: 80%;
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
    margin-top: 10px;
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
<!-- verif email start-->
<div class="bg">
    <div class="info">
        <h1>Tunggu beberapa saat</h1>
        <p>Masukkan kode <br>untuk mengatur ulang password</p>
</div>
    <div class="pop-up">
        <div class="np"><h1>Verifikasi Email</h1></div>
        <form action="{{route('verifikasi.post')}}" method="POST" class="pop-up">
            @csrf
        <div class="input">
            <input type="email" class="input" placeholder="Alamat email">
        </div>
        <button class="btn-verif"><i class='bx bxs-send'></i></button>
        <div class="input">
            <input type="text" class="input" placeholder="Kode verifikasi">
        </div>
    </div>
    <button class="btn-popup">Konfirmasi</button>
    <div class="cancel">
        <p><a href="login" class="ket">Cancel</a></p> 
    </div>
</form>
</div>
    <!-- verif email end-->
</body>
</html>