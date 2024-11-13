<?php
include('../koneksi.php');

// Ambil data dari form
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tanggal'];

// Menangani pengunggahan gambar
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
    // Variabel untuk file
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $file_name = $_FILES['gambar']['name'];
    $file_size = $_FILES['gambar']['size'];
    $file_type = $_FILES['gambar']['type'];

    // Mengatur direktori penyimpanan gambar
    $upload_dir = 'image/'; // Pastikan folder 'images' ada
    $upload_file = $upload_dir . basename($file_name);

    // Validasi ekstensi file (menerima hanya .jpg, .jpeg, .png)
    $valid_extensions = ['jpg', 'jpeg', 'png'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Validasi ukuran file (misalnya maksimal 2MB)
    $max_file_size = 2 * 1024 * 1024; // 2MB

    if (!in_array($file_ext, $valid_extensions)) {
        echo "Error: Hanya file gambar dengan format JPG, JPEG, atau PNG yang diperbolehkan.";
        exit();
    }

    if ($file_size > $max_file_size) {
        echo "Error: Ukuran file terlalu besar. Maksimal 2MB.";
        exit();
    }

    // Memindahkan file ke direktori yang dituju
    if (move_uploaded_file($file_tmp, $upload_file)) {
        // Menggunakan prepared statement untuk mencegah SQL injection
        $stmt = $koneksi->prepare("INSERT INTO kegiatan (judul, deskripsi, tempat, tanggal, gambar) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $judul, $deskripsi, $tempat, $tanggal, $upload_file);

        if ($stmt->execute()) {
            // Mengalihkan halaman kembali ke kegiatan.php
            header("Location: kegiatan.php");
            exit(); // Pastikan script berhenti setelah pengalihan
        } else {
            echo "Error: Gagal menyimpan data ke basis data.";
        }

        // Menutup statement
        $stmt->close();
    } else {
        echo "Error: Gambar gagal diunggah.";
    }
} else {
    echo "Error: " . $_FILES['gambar']['error'];
}
?>
