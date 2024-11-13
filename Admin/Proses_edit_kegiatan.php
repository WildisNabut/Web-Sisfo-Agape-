<?php
include('../koneksi.php');

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kegiatan = $_POST['id_kegiatan'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $tempat = mysqli_real_escape_string($koneksi, $_POST['tempat']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);

    // Cek apakah id_kegiatan valid
    $cek_kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE id_kegiatan = '$id_kegiatan'");
    if (mysqli_num_rows($cek_kegiatan) === 0) {
        echo "Error: ID kegiatan tidak ditemukan.";
        exit();
    }

    // Inisialisasi variabel untuk gambar
    $upload_file = '';

    // Cek apakah ada gambar baru yang diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $file_name = $_FILES['gambar']['name'];
        $upload_dir = 'image/';
        $upload_file = $upload_dir . basename($file_name);

        // Validasi ekstensi file gambar
        $valid_extensions = ['jpg', 'jpeg', 'png'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_ext, $valid_extensions)) {
            echo "Error: Hanya file gambar dengan format JPG, JPEG, atau PNG yang diperbolehkan.";
            exit();
        }

        if (!move_uploaded_file($file_tmp, $upload_file)) {
            echo "Error: Gagal mengunggah gambar.";
            exit();
        }
    }

    // Menyiapkan query untuk update data kegiatan
    if ($upload_file != '') {
        $query = "UPDATE kegiatan SET judul=?, deskripsi=?, tempat=?, tanggal=?, gambar=? WHERE id_kegiatan=?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sssssi", $judul, $deskripsi, $tempat, $tanggal, $upload_file, $id_kegiatan);
    } else {
        $query = "UPDATE kegiatan SET judul=?, deskripsi=?, tempat=?, tanggal=? WHERE id_kegiatan=?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("ssssi", $judul, $deskripsi, $tempat, $tanggal, $id_kegiatan);
    }

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Data kegiatan berhasil diupdate.'); window.location.href='kegiatan.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data kegiatan.'); window.location.href='edit_kegiatan.php?id=$id_kegiatan';</script>";
    }

    // Menutup statement
    $stmt->close();
}
?>
