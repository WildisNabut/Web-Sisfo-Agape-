<?php
include "../koneksi.php";

$NISN_Lama = $_POST['NISN_Lama'];
$NISN = $_POST['NISN'];
$Nama = $_POST['Nama'];
$Username = $_POST['Username'];
$Kota = $_POST['Kota'];
$Jenis_Kelamin = $_POST['Jenis_Kelamin'];
$Agama = $_POST['Agama'];
$id_kelas = $_POST['id_kelas'];

if ($_POST['NISN'] == "")
{
	$sqlstr="UPDATE `murid` SET `nama_murid` = '$Nama', `username` = '$Username',`kota` = '$Kota', `jenkel` = '$Jenis_Kelamin', `agama` = '$Agama', `id_kelas` = '$id_kelas' WHERE `murid`.`nisn` = '$NISN_Lama';";
}
else
{
	$sqlstr="UPDATE `murid` SET `nisn` = '$NISN',`nama_murid` = '$Nama', `username` = '$Username',`kota` = '$Kota', `jenkel` = '$Jenis_Kelamin', `agama` = '$Agama',  `id_kelas` = '$id_kelas' WHERE `murid`.`nisn` = '$NISN_Lama';";
}

(mysqli_query($koneksi, $sqlstr));

header('location:murid.php');
?>