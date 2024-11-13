<?php
include('../koneksi.php');

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil ID dan data dari form
    $id_kutipan = $_POST['id_kutipan'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    // Validasi data (misalnya, memastikan 'judul' tidak kosong)
    if (empty($judul)) {
        echo "<script>alert('Judul tidak boleh kosong.'); window.location.href='kutipan_edit.php?kode=$id_kutipan';</script>";
        exit;
    }

    // Update data di database berdasarkan id_kutipan
    $update = mysqli_query($koneksi, "UPDATE kutipan SET judul = '$judul', deskripsi = '$deskripsi' WHERE id_kutipan = '$id_kutipan'");

    if ($update) {
        echo "<script>alert('Data renungan berhasil diupdate.'); window.location.href='kutipan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data renungan.'); window.location.href='kutipan_edit.php?kode=$id_kutipan';</script>";
    }
} else {
    // Jika tidak melalui metode POST, alihkan ke halaman renungan
    header("Location: kutipan.php");
    exit;
}
?>
