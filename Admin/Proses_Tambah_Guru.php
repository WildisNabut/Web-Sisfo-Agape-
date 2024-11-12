<?php
include "../koneksi.php";


$NIP = $_POST['nip'];
$Nama_Guru = $_POST['nama_guru'];
$No_Telepon = $_POST['no_tlp'];
$Jenis_Kelamin = $_POST['jenis_kelamin'];
$Agama = $_POST['agama'];

$sqlstr="INSERT INTO `guru` (`nip`, `nama_guru`, `no_hp`, `jenkel`, `agama`) VALUES ('$NIP', '$Nama_Guru', '$No_Telepon', '$Jenis_Kelamin', '$Agama');";
(mysqli_query($koneksi, $sqlstr));

header('location:guru.php');
?>