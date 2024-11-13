<?php
include "../koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from kutipan where judul='$Kode'");
header('location:kutipan.php');
?>