<?php
include('../koneksi.php');

// Pastikan variabel `kelas` dan `nama_mpl` diambil dari data POST
$kelas = $_POST['Kelas'];
$nama_mpl = $_POST['Nama_Mata_Pelajaran'];

// Ambil data murid berdasarkan id_kelas (pastikan nama kolomnya sesuai dengan database Anda)
$tampil_murid = "SELECT * FROM murid WHERE id_kelas = '$kelas'";
$hasil_murid = mysqli_query($koneksi, $tampil_murid);

$success = true;
$i = 0;

while ($data_murid = mysqli_fetch_array($hasil_murid)) {
    // Menggunakan format array pada data POST
    $nama_murid = $_POST['nama_murid'][$i];
    $nilai_uts = $_POST['nilai_UTS'][$i];
    $nilai_uas = $_POST['nilai_UAS'][$i];

    // Cek apakah nilai untuk murid dan kelas ini sudah ada
    $tampil_nilai = mysqli_query($koneksi, "SELECT * FROM `nilai` WHERE nama_murid = '$nama_murid' AND id_kelas = '$kelas' AND nama_matapelajaran = '$nama_mpl'");

    if (mysqli_num_rows($tampil_nilai) == 0) {
        // Menambahkan data baru jika belum ada
        $sqlstr = "INSERT INTO `nilai` (`nama_murid`, `id_kelas`, `nama_matapelajaran`, `nilai_UTS`, `nilai_UAS`) 
                   VALUES ('$nama_murid', '$kelas', '$nama_mpl', '$nilai_uts', '$nilai_uas')";
    } else {
        // Mengupdate data jika sudah ada
        $sqlstr = "UPDATE `nilai` SET `nilai_UTS` = '$nilai_uts', `nilai_UAS` = '$nilai_uas' 
                   WHERE nama_murid = '$nama_murid' AND id_kelas = '$kelas' AND nama_matapelajaran = '$nama_mpl'";
    }

    // Eksekusi query dan cek jika berhasil
    if (!mysqli_query($koneksi, $sqlstr)) {
        $success = false;
    }

    $i++;
}

// Cek apakah semua query berhasil
if ($success) {
    echo '
    <script language="javascript">
        alert("Input Nilai Berhasil");
        document.location="index.php";
    </script>';
} else {
    echo '
    <script language="javascript">
        alert("Input Nilai Gagal");
        document.location="index.php";
    </script>';
}
?>
