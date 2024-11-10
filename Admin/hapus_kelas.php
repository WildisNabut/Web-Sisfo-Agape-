<?php
include "../koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from kelas where id_kelas='$Kode'");
header('location:kelas.php');
?>