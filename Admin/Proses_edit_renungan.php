<?php
include('../koneksi.php');

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil ID dan data dari form
    $id_renungan = $_POST['id_renungan'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $ayat = mysqli_real_escape_string($koneksi, $_POST['ayat']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);

    // Validasi data
    if (empty($judul)) {
        echo "<script>alert('Judul tidak boleh kosong.'); window.location.href='edit_renungan.php?kode=$id_renungan';</script>";
        exit;
    }
    
    if (empty($ayat)) {
        echo "<script>alert('Ayat Alkitab tidak boleh kosong.'); window.location.href='edit_renungan.php?kode=$id_renungan';</script>";
        exit;
    }

    // Update data di database berdasarkan ID
    $update = mysqli_query($koneksi, "UPDATE renungan SET judul = '$judul', ayat = '$ayat', tanggal = '$tanggal', isi = '$isi' WHERE id_renungan = '$id_renungan'");

    if ($update) {
        echo "<script>alert('Data renungan berhasil diupdate.'); window.location.href='renungan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data renungan.'); window.location.href='edit_renungan.php?kode=$id_renungan';</script>";
    }
} else {
    // Jika tidak melalui metode POST, alihkan ke halaman renungan
    header("Location: renungan.php");
    exit;
}
?>
