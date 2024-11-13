<?php
include('../koneksi.php');

// Ambil data dari form
$id_vidio = $_POST['id_vidio']; // Jika ID diset secara otomatis oleh database, ini bisa dikosongkan.
$judul = $_POST['judul'];
$url_vidio = $_POST['url_vidio'];

// Query untuk memasukkan data video
$query = "INSERT INTO vidio (judul, url_vidio) VALUES ('$judul', '$url_vidio')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    // Jika berhasil
    echo "Data berhasil disimpan!";
    header("Location: vidio.php"); // Redirect ke halaman video setelah berhasil
} else {
    // Jika gagal
    echo "Error: " . mysqli_error($koneksi);
}
?>
