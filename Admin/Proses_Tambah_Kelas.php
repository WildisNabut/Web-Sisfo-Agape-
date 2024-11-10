<?php
include "../koneksi.php";


$nama_kelas = $_POST['nama_kelas'];

$sqlstr="INSERT INTO `kelas` (`nama_kelas`) VALUES ('$nama_kelas');";
(mysqli_query($koneksi, $sqlstr));

header('location:kelas.php');
?>