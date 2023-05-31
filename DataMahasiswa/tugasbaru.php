<?php
include 'koneksi.php';
session_start();


if(!isset($_SESSION["login_dosen"])||$_SESSION["login_dosen"]!==true){
    header("Location: login.php");
    exit;
}




if(isset($_POST['kirim'])){
    $tugas = $_POST['Tgs'];
    $materi = $_POST['materi'];
    $batas = $_POST['batas'];
    $tanggal = date('Y-m-d'); // Ubah format tanggal menjadi 'YYYY-MM-DD' sesuai dengan format yang diharapkan oleh database Anda
    $query = "INSERT INTO tugas VALUES ('', '$materi', '$tugas', '$tanggal', '$batas')";

    if(mysqli_query($conn, $query)) {
        header("location:alltugas.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Tautan ke jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #9BA4B5;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #F1F6F9;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #111111;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    </style>
</head>
<body>
<div class="container-lg">
    <br><br>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <br><br><br>
  <a href="#">Dashbord</a>
  <hr>
  <a href="tampilan.php">Data Mahasiswa</a><hr>
  <a href="tugasbaru.php">Buat Tugas</a><hr>
  <a href="alltugas.php">Tugas Mahasiswa</a><hr>
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>  
    <br><br><br>
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <br><br><br>
  <a href="#">Dashbord</a>
  <hr>
  <a href="tampilan.php">Data Mahasiswa</a><hr>
  <a href="tugasbaru.php">Buat Tugas</a><hr>
  <a href="alltugas.php">Tugas Mahasiswa</a><hr>
</div>

    <h3>Kirim Tugas Untuk Mahasiswa</h3>
	<hr>
	<br/>
    <form action="" method="post">
   
            <label class="col-sm-2 col-form-label">Mata Kuliah</label><br>
         
                <input type="text" name="materi"  class="form-control" ><br>
                <label  class="col-sm-2 col-form-label">Deskripsi Tugas</label><br>
       
        <textarea class="form-control" name="Tgs" id="floatingTextarea2" style="height: 100px"></textarea>
        <br>
        <label for="inputEmail3" class="col-sm-2 col-form-label">Batas Tanggal</label><br>
            <input type="date" name="batas"  class="form-control" ><br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                
                <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
            </div>
           
        

    </form>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</div>
</body>
</html>