<?php
include 'koneksi.php';
session_start();


if(!isset($_SESSION["login_dosen"])||$_SESSION["login_dosen"]!==true){
    header("Location: login.php");
    exit;
}


$id=$_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tugas WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['kirim'])){
    $tugas = $_POST['Tgs'];
    $materi = $_POST['materi'];
    $batas = $_POST['batas'];
    $tanggal = date('Y-m-d'); // Ubah format tanggal menjadi 'YYYY-MM-DD' sesuai dengan format yang diharapkan oleh database Anda
    $query = "UPDATE tugas SET materi='$materi', tugas='$tugas', tanggal='$tanggal', tanggal_pengumpulan='$batas' WHERE id='$id'";
        if (mysqli_query($conn, $query)) {
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
    
</head>
<body>
<div class="container-lg">
    <br><br>
    <a href="alltugas.php">Kembali</a>


    <br><br><br>
  

    <h3>Kirim Tugas Untuk Mahasiswa</h3>
	<hr>
	<br/>
    <form action="" method="post">
   
            <label class="col-sm-2 col-form-label">Mata Kuliah</label><br>
         
                <input type="text" name="materi"  class="form-control" value="<?php echo $d['materi'];?>" ><br>
                <label  class="col-sm-2 col-form-label">Deskripsi Tugas</label><br>
       
        <input class="form-control" name="Tgs" id="floatingTextarea2" style="height: 100px" value="<?php echo $d['tugas'];?>"></input>
        <br>
        <label for="inputEmail3" class="col-sm-2 col-form-label">Batas Tanggal</label><br>
            <input type="date" name="batas"  class="form-control" value="<?php echo $d['tanggal'];?>" ><br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                
                <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
            </div>
           
    </form>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</div>
</body>
</html>