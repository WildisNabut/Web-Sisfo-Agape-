<?php
include('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cek apakah id_tugas ada dan valid
    if (isset($_POST['id_tugas']) && is_numeric($_POST['id_tugas'])) {
        $id_tugas = mysqli_real_escape_string($koneksi, $_POST['id_tugas']);

        // Log nilai id_tugas untuk debugging
        error_log("ID Tugas yang diterima: $id_tugas");

        // Query database
        $query_tugas = "SELECT t.nama_tugas, t.deskripsi, t.tanggal_selesai, t.status, mp.nama_matapelajaran 
                        FROM tugas t
                        JOIN mata_pelajaran mp ON t.kode_mata_pelajaran = mp.kode_mata_pelajaran
                        WHERE t.id_tugas = ?";
        $stmt = mysqli_prepare($koneksi, $query_tugas);
        mysqli_stmt_bind_param($stmt, "i", $id_tugas);
        mysqli_stmt_execute($stmt);
        $result_tugas = mysqli_stmt_get_result($stmt);

        // Tampilkan hasil
        if (mysqli_num_rows($result_tugas) > 0) {
            while ($row = mysqli_fetch_assoc($result_tugas)) {
                $status = $row['status'] == 'selesai' ? "<span class='badge bg-success'>Selesai</span>" : "<span class='badge bg-warning'>Belum Selesai</span>";
                $tanggal_selesai = date("d-m-Y", strtotime($row['tanggal_selesai']));

                echo "<div class='card shadow-lg mb-4'>
                        <div class='card-body'>
                            <h4 class='card-title mb-3 text-primary'>{$row['nama_tugas']}</h4>
                            <h6 class='card-subtitle text-muted mb-2'>
                                <i class='fas fa-book'></i> {$row['nama_matapelajaran']}
                            </h6>
                            <hr>
                            <p class='card-text mb-4'>{$row['deskripsi']}</p>
                            <div class='d-flex justify-content-between'>
                                <div>
                                    <h6 class='text-muted mb-1'><i class='fas fa-calendar-alt'></i> Batas Waktu</h6>
                                    <p class='mb-0'>$tanggal_selesai</p>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "<div class='alert alert-info'>Tidak ada tugas dengan ID tersebut.</div>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<div class='alert alert-danger'>ID Tugas tidak valid atau tidak ditemukan!</div>";
    }
}
?>
