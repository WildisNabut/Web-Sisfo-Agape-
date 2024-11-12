<?php

// koneksi basis data
include '../koneksi.php';

// menangkap data yang dikirim dari form 
$judul = $_POST['judul'];
$dekripsi = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];

// input data ke basis data 
$query = "INSERT INTO pengumuman (judul, dekripsi, tanggal, status) VALUES ('$judul', '$dekripsi', '$tanggal', '$status')";
if (mysqli_query($koneksi, $query)) {
    // mengalihkan halaman kembali ke pengumuman.php
    header("location:pengumuman.php");
} else {
    // menampilkan pesan kesalahan jika ada
    echo "Error: " . mysqli_error($koneksi);
}

?>
