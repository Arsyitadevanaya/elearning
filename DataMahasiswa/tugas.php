<?php
include 'koneksi.php';
session_start();


if(!isset($_SESSION["login_dosen"])||$_SESSION["login_dosen"]!==true){
    header("Location: login.php");
    exit;
}
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['kirim'])){
    $tugas=$_POST['Tgs'];

    $query = "UPDATE mahasiswa SET tugas='$tugas' WHERE id='$id'";
        if (mysqli_query($conn, $query)) {
            echo "<script>window.location.href='tugas.php?id=$id';</script>";
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
    <br><br><br>
    <a  href="tampilan.php" >Kembali</a><hr>

    <h3>Kirim Tugas Untuk Mahasiswa</h3>
	<hr>
	<br/>
    <form action="" method="post">
        <textarea class="form-control" name="Tgs" id="floatingTextarea2" style="height: 100px"><?php echo $d['Tugas']; ?></textarea>
        <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                
                <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
            </div>
    </form>
    <h3>Tugas Mahasiswa</h3>
	<hr>
	<br/>
    <table class="table table-hover " >
		<tr class="table-secondary" align="center">
			<th>Tugas</th>
            <th>Ukuran</th>
            <th>Download</th>
		</tr>
		<tr >
            <td><?php echo $d['files']; ?></td>    
			<td align="center"><button class="btn btn-warning btn-sm"><?php echo round($d['size'] / 1024, 2); ?>KB</button></td>
            <td align="center"><a  href="download.php?filename=<?=$d['files']?>"><i class="fa-sharp fa-solid fa-download fa-lg" style="color: #1100ff;"></i></a></td>
		</tr>
			
	</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</div>
</body>
</html>