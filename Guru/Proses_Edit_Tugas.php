<?php
// Menyertakan koneksi ke database
include('../koneksi.php');

// Memastikan bahwa data dari form telah dikirim
if (isset($_POST['id_tugas'])) {
    // Ambil data dari form
    $id_tugas = $_POST['id_tugas'];
    $id_kelas = $_POST['id_kelas'];
    $kode_mata_pelajaran = $_POST['kode_mata_pelajaran'];
    $nama_tugas = $_POST['nama_tugas'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $status = $_POST['status'];

    // Query untuk memperbarui data tugas
    $query = "UPDATE tugas 
              SET id_kelas = '$id_kelas', 
                  kode_mata_pelajaran = '$kode_mata_pelajaran',
                  nama_tugas = '$nama_tugas', 
                  deskripsi = '$deskripsi', 
                  tanggal_selesai = '$tanggal_selesai', 
                  status = '$status' 
              WHERE id_tugas = '$id_tugas'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, redirect ke halaman tugas
        header("Location: index.php?message=update_success");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika id_tugas tidak ditemukan dalam POST, tampilkan pesan error
    echo "Tugas tidak ditemukan.";
    exit();
}
?>
