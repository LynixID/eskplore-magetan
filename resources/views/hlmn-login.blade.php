<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
    <style>
body{
    background-color: #eaeaea;
}
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
    padding: 10px 150px 10px 100px;
    width: 90px;
    display: flexbox;
    border-radius: 10px;
    cursor: pointer;
    text-decoration: none;
    margin-left:110px;
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
    <!-- login start-->
    <div class ="bg">
    <div class="info">
        <h1>Selamat datang<br> kembali!</h1>
        <p>Halaman ini digunakan untuk login admin<br>bagi pengunjung biasa mohon tidak mengisinya</p>
        <p> Terima kasih!</p>
    </div>
    <form action="{{route('login.post')}}" method="POST" class ="pop-up">
        @csrf
        <div class="np"><h1>Login</h1></div><br>
        <div class="input">
            <i class='bx bxs-user'></i>
            <input type="text" class="input" placeholder="Username" name="nama_depan">
        </div>
        <div class="input">
            <i class='bx bxs-id-card'></i>
            <input type="text" class="input" placeholder="ID Admin" name="id_admin"/>
        </div>
        <div class="input">
            <i class='bx bx-key' ></i>
            <input type="password" class="input" placeholder="Password" name="password" required/>    
        </div>
        <div class="pw">
            <p><a href="/ganti-password" class="ket">Lupa password</a></p>
        </div>
        <button type="submit" class="btn-popup">Masuk</button>
        <div class="buat-akun">
            <p><a href="/buat" class="ket">Buat akun</a></p>
        </div>
</form>
    </div>
    <!-- login end-->
</body>
</html>