<?php
include('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_mata_pelajaran = $_POST['kode_mata_pelajaran'];

    $query_tugas = "SELECT nama_tugas, deskripsi, tanggal_selesai, status FROM tugas WHERE kode_mata_pelajaran = '$kode_mata_pelajaran'";
    $result_tugas = mysqli_query($koneksi, $query_tugas);

    if (mysqli_num_rows($result_tugas) > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Nama Tugas</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = mysqli_fetch_assoc($result_tugas)) {
            echo "<tr>
                    <td>{$row['nama_tugas']}</td>
                    <td>{$row['deskripsi']}</td>
                    <td>{$row['tanggal_selesai']}</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Tidak ada tugas untuk mata pelajaran ini.</p>";
    }
}
?>
