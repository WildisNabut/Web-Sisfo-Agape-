<?php
include "../koneksi.php";


$NIP = $_POST['nip'];
$username = $_POST['username'];
$Nama_Guru = $_POST['nama_guru'];
$No_Telepon = $_POST['no_tlp'];
$Jenis_Kelamin = $_POST['jenis_kelamin'];
$Agama = $_POST['agama'];

$sqlstr="INSERT INTO `guru` (`nip`, `nama_guru`, `username`, `no_hp`, `jenkel`, `agama`) VALUES ('$NIP', '$Nama_Guru', '$username', '$No_Telepon', '$Jenis_Kelamin', '$Agama');";
(mysqli_query($koneksi, $sqlstr));

header('location:guru.php');
?>