<?php
include "../koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from guru where judul='$Kode'");
header('location:renungan.php');
?>