<?php
include 'koneksi.php';
$id = $_GET['id'];


$query = "DELETE FROM tugas WHERE id='$id'";
if (mysqli_query($conn, $query)) {
    echo "<script>alert('Menghapus');window.location.href='alltugas.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>