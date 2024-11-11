<?php
include "../koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from guru where id_renungan='$Kode'");
header('location:renungan.php');
?>