<?php
include('../koneksi.php');

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $ayat = mysqli_real_escape_string($koneksi, $_POST['ayat']);  // Menggunakan 'ayat' alih-alih 'nama_kelas'
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);

    // Validasi data (misalnya, memastikan 'judul' tidak kosong)
    if (empty($judul)) {
        echo "<script>alert('Judul tidak boleh kosong.'); window.location.href='edit_renungan.php?kode=$judul';</script>";
        exit;
    }
    
    // Pastikan 'ayat' tidak kosong jika diperlukan
    if (empty($ayat)) {
        echo "<script>alert('Ayat Alkitab tidak boleh kosong.'); window.location.href='edit_renungan.php?kode=$judul';</script>";
        exit;
    }

    // Update data di database
    $update = mysqli_query($koneksi, "UPDATE renungan SET judul = '$judul', ayat = '$ayat', tanggal = '$tanggal', isi = '$isi' WHERE judul = '$judul'");

    if ($update) {
        echo "<script>alert('Data renungan berhasil diupdate.'); window.location.href='renungan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data renungan.'); window.location.href='edit_renungan.php?kode=$judul';</script>";
    }
} else {
    // Jika tidak melalui metode POST, alihkan ke halaman renungan
    header("Location: renungan.php");
    exit;
}
?>
