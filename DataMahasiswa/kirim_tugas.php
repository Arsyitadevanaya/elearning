<?php
include 'koneksi.php';
session_start();


if(!isset($_SESSION["login_mahasiswa"])||$_SESSION["login_mahasiswa"]!==true){
    header("Location: login.php");
    exit;
}


$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM tugas WHERE id='$id'");
$d = mysqli_fetch_array($data);
if(isset($_POST['kirim'])){
    $nama = $_SESSION["username"];
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $tanggal = date('Y-m-d'); // Ubah format tanggal menjadi 'YYYY-MM-DD' sesuai dengan format yang diharapkan oleh database Anda
    
    move_uploaded_file($file_tmp, 'file/' . $file);
    $query = "INSERT INTO pengumpulan VALUES ('$nama', '$file', '$ukuran', '$tanggal', '0',' ')";
   
    if (mysqli_query($conn, $query)) {
        header("location:tugasMHS.php");
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
    <a  href="tampilanMahasiswa.php" >Kembali</a>
    <br><br>
    <form action="" enctype="multipart/form-data" method="post">
        <h3>Tugas Hari ini</h3><hr>
        <b>Tanggal Tugas : </b><p><?php echo $d['tanggal']; ?></p>
        <b>Mata Kuliah : </b><p><?php echo $d['materi']; ?></p> 
        <b>Deskripsi Tugas : </b><p><?php echo $d['tugas']; ?></p>
        <b>Batas Tugas : </b><p><?php echo $d['tanggal_pengumpulan']; ?></p><hr>
        <br>
        <h3>Kirim Tugas</h3><hr><br>
        <input type="file" name="file" >
        <input type="submit" value="Kirim" name="kirim" >
       
    </form>
    
   
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>

