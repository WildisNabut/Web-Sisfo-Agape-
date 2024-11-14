<?php
include "../koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from tugas where id_tugas='$Kode'");
header('location:index.php');
?>