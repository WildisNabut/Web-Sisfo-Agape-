<?php
include('../koneksi.php');

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_kelas = mysqli_real_escape_string($koneksi, $_POST['id_kelas']);
    $nama_kelas = mysqli_real_escape_string($koneksi, $_POST['nama_kelas']);

    // Validasi data (misalnya, memastikan nama kelas tidak kosong)
    if (empty($nama_kelas)) {
        echo "<script>alert('Nama Kelas tidak boleh kosong.'); window.location.href='edit_kelas.php?kode=$id_kelas';</script>";
        exit;
    }

    // Update data kelas di database
    $update = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas = '$id_kelas'");

    if ($update) {
        echo "<script>alert('Data kelas berhasil diupdate.'); window.location.href='kelas.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data kelas.'); window.location.href='edit_kelas.php?kode=$id_kelas';</script>";
    }
} else {
    // Jika tidak melalui metode POST, alihkan ke halaman kelas
    header("Location: kelas.php");
    exit;
}
?>
