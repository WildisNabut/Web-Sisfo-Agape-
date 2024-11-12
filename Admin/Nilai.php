<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>SMP AGAPE INDAH</title>

  <!-- Custom fonts and styles for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Data Sekolah Section -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Data Sekolah</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Sekolah</h6>
            <a class="collapse-item" href="akun.php">Akun</a>
            <a class="collapse-item" href="guru.php">Guru</a>
            <a class="collapse-item" href="murid.php">Siswa</a>
            <a class="collapse-item" href="kelas.php">Kelas</a>
            <a class="collapse-item" href="mata_pelajaran.php">mata pelajaran</a>
            <a class="collapse-item" href="Nilai.php">Nilai</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Nav Item - Renungan -->
      <li class="nav-item">
        <a class="nav-link" href="renungan.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Renungan</span>
        </a>
      </li>

      <!-- Sidebar Toggler -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <h4 class="modal-title mx-auto">Nilai</h4>

  <!-- Message Icon with separator -->
  <a class="nav-link" href="pesan.php">
    <i class="fas fa-envelope fa-fw"></i>
    <!-- Counter - Messages (Optional) -->
  </a>

  <!-- Divider between Message and User icons -->
  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- User Dropdown (aligned to right) -->
  <ul class="navbar-nav ml-auto">
    <?php
    @session_start();
    if (empty($_SESSION['username'])) {
      echo "
      <li class='nav-item'>
        <a class='nav-link' href='#' data-toggle='modal' data-target='#myModal2'><i class='fa fa-sign-in' aria-hidden='true'></i> Masuk</a>
      </li>";
    } else {
      echo "
      <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle user-dropdown' href='#' id='userDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          <span class='mr-2 d-none d-lg-inline text-gray-600 small'>$_SESSION[username]</span>
          <i class='fas fa-user'></i>
        </a>
        <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='userDropdown'>
          <a class='dropdown-item' href='../logout.php'><i class='fa fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>Logout</a>
        </div>
      </li>";
    }
    ?>
  </ul>
</nav>
<!-- End of Topbar -->
        <!-- End of Topbar -->


        
        <!-- konten yang ingin di rubah -->
		<?php include('../koneksi.php');
// Menangani permintaan POST dari form
if (isset($_POST['kelas'])) {
    $kelas = $_POST['kelas'];
    
    // Query untuk mengambil data siswa dan nilai berdasarkan kelas
    $query = "
        SELECT s.nama_murid, m.nama_matapelajaran, n.nilai_UTS, n.nilai_UAS
        FROM murid s
        LEFT JOIN nilai n ON s.nisn = n.nisn
        LEFT JOIN mata_pelajaran m ON n.mata_pelajaran = m.kode_mata_pelajaran
        WHERE s.id_kelas = '$kelas'
    ";
    $result = mysqli_query($koneksi, $query);
}
?>

<!-- Form untuk memilih kelas -->
<div id="Pilih_kelas">
    <div class="container roma-batasan">
        <form action="" method="post">
            <table class="table roma-table" border="0">
                <tr>
                    <td>Kelas :</td>
                    <td>
                        <select name="kelas">
                            <?php
                            // Query untuk mengambil data kelas
                            $tampil = "SELECT * FROM `kelas`";
                            $hasil = mysqli_query($koneksi, $tampil);
                            while ($data = mysqli_fetch_array($hasil)) {
                                echo "<option value='$data[nama_kelas]'>$data[nama_kelas]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan=2 align="left">
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<!-- Tabel untuk menampilkan data siswa dan nilai -->
<div class="container">
    <h3>Data Nilai Siswa Kelas <?php echo isset($kelas) ? $kelas : ''; ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Mata Pelajaran</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($result) && mysqli_num_rows($result) > 0) {
                $currentStudent = "";
                while ($row = mysqli_fetch_assoc($result)) {
                    // Tampilkan nama siswa hanya sekali per siswa
                    if ($currentStudent != $row['nama_murid']) {
                        echo "<tr><td rowspan='3'>{$row['nama_murid']}</td>";
                        $currentStudent = $row['nama_murid'];
                    } else {
                        echo "<tr>";
                    }

                    echo "<td>{$row['nama_matapelajaran']}</td>";

                    // Tampilkan nilai UTS, jika null tampilkan input field
                    $nilai_uts = is_null($row['nilai_UTS']) ? "<input type='number' name='nilai_uts[]'>" : $row['nilai_UTS'];
                    echo "<td>$nilai_uts</td>";

                    // Tampilkan nilai UAS, jika null tampilkan input field
                    $nilai_uas = is_null($row['nilai_UAS']) ? "<input type='number' name='nilai_uas[]'>" : $row['nilai_UAS'];
                    echo "<td>$nilai_uas</td>";
                    
                    // Tampilkan tombol untuk input nilai jika nilai UTS atau UAS belum ada
                    if (is_null($row['nilai_UTS']) || is_null($row['nilai_UAS'])) {
                        echo "<td><button class='btn btn-success'>Input Nilai</button></td>";
                    } else {
                        echo "<td>-</td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' align='center'>Data nilai belum tersedia. Silakan input nilai.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
>

        <!-- akhir dari konten -->



      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ilmu komputer 2024</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
