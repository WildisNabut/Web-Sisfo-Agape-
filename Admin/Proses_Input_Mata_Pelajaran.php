<?php
include "../koneksi.php";

$Kode = $_POST['Kode'];
$Nama_Mata_Pelajaran = $_POST['Nama_Mata_Pelajaran'];
// Memeriksa apakah kode mata pelajaran sudah ada
$sql = mysqli_query($koneksi, "SELECT * FROM `mata_pelajaran` WHERE kode_mata_pelajaran = '$Kode' ") or die(mysqli_error($koneksi));

if (mysqli_num_rows($sql) == 0) {
    // Menyimpan data mata pelajaran dengan id_kelas
    $input = "INSERT INTO `mata_pelajaran` (`kode_mata_pelajaran`, `nama_matapelajaran`) 
              VALUES ('$Kode', '$Nama_Mata_Pelajaran');";
    mysqli_query($koneksi, $input);
    header('location:mata_pelajaran.php');
} else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Kode sudah Dipakai')
                window.location.href='mata_pelajaran.php';
            </SCRIPT>");
}
?>
