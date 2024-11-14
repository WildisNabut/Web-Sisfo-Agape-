<?php
session_start(); // Memastikan sesi dimulai

// Memastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan username dari sesi
    $username = $_SESSION['username'];
    $id_kelas = $_POST['id_kelas'];
    $kode_mata_pelajaran = $_POST['kode_mata_pelajaran'];
    $nama_tugas = $_POST['nama_tugas'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $status = "Sedang Berlangsung";

    // Validasi untuk memastikan semua field telah diisi
    if (empty($id_kelas) || empty($nama_tugas) || empty($deskripsi) || empty($tanggal_selesai)) {
        echo "<script>alert('Pastikan semua field terisi.'); window.location.href='Tambah_Tugas.php';</script>";
        exit();
    }

    // Sanitasi data untuk keamanan
    $id_kelas = htmlspecialchars($id_kelas);
    $nama_tugas = htmlspecialchars($nama_tugas);
    $deskripsi = htmlspecialchars($deskripsi);

    // Query INSERT tanpa kolom id_tugas
    $query = "INSERT INTO tugas (username, id_kelas, kode_mata_pelajaran, nama_tugas, deskripsi, tanggal_selesai, status)
              VALUES ('$username', '$id_kelas', '$kode_mata_pelajaran', '$nama_tugas', '$deskripsi', '$tanggal_selesai', '$status')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Tugas berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan tugas: " . mysqli_error($koneksi) . "'); window.location.href='Tambah_Tugas.php';</script>";
    }

    mysqli_close($koneksi);
} else {
    header("Location: index.php");
    exit();
}
?>
