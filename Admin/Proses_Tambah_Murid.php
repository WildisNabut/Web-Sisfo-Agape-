<?php
include "../koneksi.php";


$NISN = $_POST['NISN'];
$Username = $_POST['Username'];
$Nama = $_POST['Nama'];
$Kota = $_POST['Kota'];
$Jenis_Kelamin = $_POST['Jenis_Kelamin'];
$Agama = $_POST['Agama'];
$id_kelas = $_POST['id_kelas'];

$sqlstr="INSERT INTO `murid` (`nisn`, `nama_murid`, `username`,`kota`, `jenkel`, `agama`,  `id_kelas`) VALUES ('$NISN', '$Nama', '$Username','$Kota', '$Jenis_Kelamin', '$Agama',  '$id_kelas');";
(mysqli_query($koneksi, $sqlstr));

header('location:murid.php');
?>