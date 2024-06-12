<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="pop-up.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti password</title>
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
    margin-top:50px;
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
    align-items: center;
    padding: 10px 120px 10px 90px;
    width: 70px;
    display: flex;
    border-radius: 10px;
    cursor: pointer;
    text-decoration: none;
    margin:100px 0 0 120px;
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
.alert-box {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 15%;
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
    <!-- ganti password start-->
<div class="bg">
    <div class="info">
        <h1>Ganti password</h1>
        <p>Pastikan password yang dituliskan telah benar</p>
    </div>
    <form action="{{route('gantiPassword.post')}}" METHOD="POST" class="pop-up">
        @csrf
        <div class="np"><h1>Ubah Password</h1></div>
        <div class="isi">
            <div class="input">
                <input type="email" name="alamat_email" class="input" placeholder="Email">
            </div>
            <div class="input">
                <input type="password" name="password" class="input" placeholder="Password baru">
            </div>
            <div class="input">
                <input type="password" name="password_confirmation" class="input" placeholder="Ketik ulang password baru">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger alert-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <button class="btn-popup">Reset</button>
        <div class="cancel">
            <p ><a href="/login" class="ket">Cancel</a></p> 
        </div>
    </form>
</div>
<!-- ganti password end-->
</body>
</html>