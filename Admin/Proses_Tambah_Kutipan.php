<?php
include('../koneksi.php');

// Tangkap data dari form dan amankan
$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

// Pastikan query SQL menggunakan kutipan pada nilai yang dimasukkan
$query = "INSERT INTO `kutipan` (`judul`, `deskripsi`) VALUES ('$judul', '$deskripsi')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Kutipan berhasil ditambahkan!'); window.location.href='kutipan.php';</script>";
} else {
    echo "<script>alert('Gagal menambahkan kutipan!'); window.location.href='kutipan.php';</script>";
}
?>
