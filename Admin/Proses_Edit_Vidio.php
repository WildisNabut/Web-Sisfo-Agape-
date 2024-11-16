<?php
// Menghubungkan ke database
include('../koneksi.php');

// Memeriksa apakah request datang dari form edit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form edit
    $id_vidio = $_POST['id_vidio'];
    $judul = $_POST['judul'];
    $url_vidio = $_POST['url_vidio'];

    // Query untuk mengupdate data video berdasarkan id_vidio
    $query = "UPDATE vidio SET judul = '$judul', url_vidio = '$url_vidio' WHERE id_vidio = '$id_vidio'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Redirect ke halaman vidio.php jika berhasil
        header("Location: vidio.php?status=success");
    } else {
        // Tampilkan pesan error jika gagal
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    // Redirect jika tidak ada data POST
    header("Location: vidio.php");
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
