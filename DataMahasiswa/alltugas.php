<?php
include 'koneksi.php';
session_start();


if(!isset($_SESSION["login_dosen"])||$_SESSION["login_dosen"]!==true){
    header("Location: login.php");
    exit;
}


$data = mysqli_query($conn, "SELECT * FROM tugas ");
$d = mysqli_fetch_array($data);


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
    <br><br>
<div class="container-lg">
    
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

   
        
    
	<br/>
    <br><br>
    <h3>Tugas Mahasiswa</h3>
	<hr>
	<br/>
    <table class="table table-hover " >
		<tr class="table-secondary" align="center">
			<th>No</th>
            <th>Mata Kuliah</th>
            <th>Tugas</th>
            <th>Tanggal Tugas</th>
            <th>Batas Tugas</th>
            <th>Keterangan</th>
		</tr>
        <?php
        $no=1;
        $data = mysqli_query($conn, "SELECT * FROM tugas ");
        while($d = mysqli_fetch_array($data)){
            
        
        
        ?>
		<tr >
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['materi']; ?></td>    
            <td><?php echo $d['tugas']; ?></td> 
            <td align="center"  ><?php echo $d['tanggal']; ?></td> 
            <td align="center"  ><?php echo $d['tanggal_pengumpulan']; ?></td> 
            <td align="center">
					
					<a href="edittugas.php?id=<?php echo $d['id']; ?>">
						<button type="button" class="btn btn-success btn-sm">UPDATE</button>
					</a><br>
					<a href="deletetugas.php?id=<?php echo $d['id']; ?>">
						<button type="button" class="btn btn-danger btn-sm">DELETE</button>
					</a>
				</td>
			
		</tr>
		<?php
        }
        ?>
	</table>
        <br><br>
        <h3>Pengumpulan</h3><hr>
        <br>
        </table>
    <br>
    
   
    <table class="table table-hover " >
		<tr class="table-secondary" align="center">
			<th>Nama</th>
            <th>File</th>
            <th>Ukuran</th>
            <th>Tanggal</th>
            <th>Download</th>
            <th>Nilai</th>
            <th>Beri Nilai</th>
            
		</tr>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM pengumpulan");
        while($a=mysqli_fetch_array($data)){
        
        

        ?>
		<tr >
            <td><?php echo $a['nama']; ?></td> 
            <td align="center" ><?php echo $a['files']; ?></td>    
			<td align="center"><button class="btn btn-warning btn-sm"><?php echo round($a['ukuran'] / 1024, 2); ?>KB</button></td>
            <td align="center"><?php echo $a['tanggal']; ?></td> 
            <td align="center"><a  href="download.php?filename=<?=$a['id']?>"><i class="fa-sharp fa-solid fa-download fa-lg" style="color: #1100ff;"></i></a></td>
            <td align="center">
            <?php
            if($a['nilai']==0){
                echo '<span style="color: red;">Belum Ada Nilai</span>';

            }else{
                echo '<span style="color: green;">' . $a['nilai'] . '</span>';

            }
            ?>  </td>
            <td align="center" ><a href="nilai.php?id=<?php echo $a['id']; ?>">
						<button type="button">Nilai</button>
					</a>
				</td>
        
            
		</tr>
		<?php
        }

        ?>
	</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</div>
</body>
</html>