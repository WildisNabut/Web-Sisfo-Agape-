<?php
include "../koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from kegiatan where id_kegiatan='$Kode'");
header('location:kegiatan.php');
?>