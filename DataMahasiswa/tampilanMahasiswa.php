<?php
session_start();


if(!isset($_SESSION["login_mahasiswa"])||$_SESSION["login_mahasiswa"]!==true){
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html>
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
	a {
  	color: inherit;
  	text-decoration: none;
	}
	h3{
		margin-top: 50px;
	}

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
	<br><br>
	<div class="container-lg">
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <br><br><br>
  <a href="#">Dashbord</a>
  <hr>
  <a href="tampilanMahasiswa.php">Data Mahasiswa</a><hr>
  <a href="tugasMHS.php">Pengumpulan Tugas</a><hr>
  
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
		<br><br>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
		<a class="btn btn-primary" href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-lg" style="color: #ffffff;"></i></a>
		</div>
	<h3>SELAMAT DATANG MAHASISWA PENS 2022</h3>
	<hr>
	<br/>
	

	<br/>
	<br/>
	<form  method="post" class="d-flex" role="search" style="justify-content: flex-end;">
  		<div style="display: flex;">
    	<input class="form-control me-2" name="cari_nama" type="search" placeholder="Search" aria-label="Search" style="max-width: 200px;" autofocus autocomplete="off">
    	<button class="btn btn-outline-success" type="submit" name="cari" >Search</button>
  		</div>
	</form><br><br>

	<table class="table table-hover " >
		<tr class="table-secondary" align="center">
			<th>NO</th>
            <th>NRP</th>
			<th>Foto</th>
			<th>Nama Lengkap</th>
			<th>Jenis Kelamin</th>
			<th>Jurusan</th>
			<th>Email Student</th>
            <th>Nomor HP</th>

            
		</tr>
		<?php 
		include 'koneksi.php';
		if(isset($_POST['cari'])){
			$caridata = $_POST['cari_nama'];
			$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$caridata%' OR 
					nrp LIKE '%$caridata%' OR email LIKE '%$caridata%' OR no_hp LIKE '%$caridata%' OR
					jenis_kelamin LIKE '%$caridata
					%' OR jurusan LIKE '%$caridata%'";
		}else{
			$query = "SELECT * FROM mahasiswa";
		}
		
		$no = 1;
		
		$data = mysqli_query($conn,$query);
		while($d = mysqli_fetch_array($data)){
			?>
			<tr >
				<td><?php echo $no++; ?></td>
                <td><?php echo $d['nrp']; ?></td>
				<td><img width="100px" height="150px" src="<?php echo "Photo/".$d['foto']; ?>"></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['jenis_kelamin']; ?></td>
                <td><?php echo $d['jurusan']; ?></td>
                <td><?php echo $d['email']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
				

				
				
			</tr>
			<?php 
		}
		?>
	</table>
	

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</div>

<?php
if(isset($_POST['cari'])){
    $cari_nama = $_POST['cari'];
	
    $kirim = "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari_nama%'";
	
}


?>
<br><br><br>
</body>
</html> 