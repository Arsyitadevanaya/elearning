<?php
include 'koneksi.php';

if(isset($_POST["register"])){
    $username = strtolower(stripslashes($_POST["username"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);
    $level=$_POST["level"];
    if(!$username&& !$password){
        echo "<script>alert('Gagal Registrasi');window.location.href='register.php';</script>";
        die();
    }
    if($password !== $password2){
        echo "<script>alert('Konfirmasi Password tidak sesuai');window.location.href='register.php';</script>";
       
        die();
    }
    //cek username
    $result=mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Username sudah terdaftar'); window.location.href='register.php';</script>";
        die();
       
    }
    //enkripsi password(mengamankan password)
    $password=password_hash($password, PASSWORD_DEFAULT);
    //memasukkan ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$level')");
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #0041b8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            
            width: 600px;
        }
        img{
            margin-top: 140px;
        }
        .card-body{
            margin: 20px;
        }
    </style>
</head>
<body>
    
    <div class="content">
        <div class="card mb-3" >
            <div class="row g-0">
                
                
                    <div class="card-body"><br>
                        <h1 class="card-title fw-bold">Sign in</h1><br><br>
                        <form action="" method="post">
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" placeholder="Masukkan Pasword">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password2" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" placeholder="Verifikasi Pasword">
                            </div>
                           
                            <select class="form-select form-select-mb-3" name="level" aria-label=".form-select-sm example" >
                                <option selected>Mendaftar Sebagai</option>
                                <option value="dosen" >Dosen</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                            
                            <a href="login.php">Log in</a><br><br>
                            <button type="submit" class="btn btn-primary" name="register">Sign up</button>
                        </form>
                    </div>
                
            </div>
        </div>
            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

