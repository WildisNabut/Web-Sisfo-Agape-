<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Periksa apakah level pengguna adalah admin
if ($_SESSION["level"] != "siswa") {
    header("Location: login.php"); // Redirect ke halaman login jika bukan admin
    exit();
}
?>
