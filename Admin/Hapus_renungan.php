<?php
include "../koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from renungan where judul='$Kode'");
header('location:renungan.php');
?>