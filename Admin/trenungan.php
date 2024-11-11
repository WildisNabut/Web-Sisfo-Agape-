<?php

// koneksi basis data
include "../koneksi.php";

// menangkap data yang dikirim dari form 
$judul = $_POST['judul'];
$ayat = $_POST['ayat'];
$tanggal = $_POST['tanggal'];
$isi = $_POST['isi'];

// input data ke basis data 
$query = "INSERT INTO renungan (judul, ayat, tanggal, isi) VALUES ('$judul', '$ayat', '$tanggal', '$isi')";
if (mysqli_query($koneksi, $query)) {
    // mengalihkan halaman kembali ke pengumuman.php
    header("location:renungan.php");
} else {
    // menampilkan pesan kesalahan jika ada
    echo "Error: " . mysqli_error($koneksi);
}

?>
