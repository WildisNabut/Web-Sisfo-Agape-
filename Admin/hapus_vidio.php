<?php
include "../koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from vidio where id_vidio='$Kode'");
header('location:vidio.php');
?>