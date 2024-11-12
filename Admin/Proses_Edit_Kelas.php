<?php
include('../koneksi.php');

// Periksa apakah form telah disubmit
$notification = ""; // Variabel untuk menyimpan status notifikasi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $ayat = mysqli_real_escape_string($koneksi, $_POST['ayat']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $kode = $_GET['kode']; // Kode untuk identifikasi data yang akan diubah

    // Perbarui data di database
    $sqlstr = "UPDATE renungan SET judul='$judul', ayat='$ayat', tanggal='$tanggal', isi='$isi' WHERE judul='$kode'";

    if (mysqli_query($koneksi, $sqlstr)) {
        $notification = "success"; // Notifikasi sukses
    } else {
        $notification = "failed"; // Notifikasi gagal
    }
}

// Ambil data untuk form edit
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];
    $query = mysqli_query($koneksi, "SELECT * FROM renungan WHERE judul='$kode'");
    $data = mysqli_fetch_array($query);
}
?>