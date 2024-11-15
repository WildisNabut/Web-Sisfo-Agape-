<?php
include ('../koneksi.php');
?>
<?php include ('autentikasi.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Smp Agape Indah</title>

  <!-- Custom fonts and styles for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include ('sidebar.php'); ?> 
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

  <h4 class="modal-title mx-auto">Form Edit Mata Pelajaran</h4>

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
        <a class='dropdown-item' href='#' data-toggle='modal' data-target='#logoutModal'>
          <i class='fa fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>Logout
        </a>
      </div>
      </li>";
    }
    ?>
  </ul>
</nav>
<!-- End of Topbar -->
 <!-- End of Topbar -->

  <!-- konten yang ingin di rubah -->

<!-- Edit Mata Pelajaran -->
<div id="Edit_Akun" class="container my-5">
    <div class="container p-3 bg-light shadow rounded">

        <?php
        include('../koneksi.php');
        $Kode = $_GET['kode'];
        $query = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE kode_mata_pelajaran='$Kode'");
        $data = mysqli_fetch_array($query);
        ?>

        <form class="form-group" action="Proses_Edit_Mata_Pelajaran.php" method="post">
            <div class="mb-3">
                <label for="kodeLama" class="form-label">Kode Mata Pelajaran:</label>
                <input type="text" name="Kode_lama" class="form-control" id="kodeLama" onkeypress="return hanyaAngka(event)" value="<?php echo "$Kode"; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="kodeMapel" class="form-label">Kode Mata Pelajaran Baru:</label>
                <input type="text" name="Kode_mapel" class="form-control" id="kodeMapel" onkeypress="return hanyaAngka(event)" placeholder="<?php echo "$Kode"; ?>">
            </div>

            <div class="mb-3">
                <label for="namaMapel" class="form-label">Nama Mata Pelajaran:</label>
                <input type="text" name="Nama_Mata_Pelajaran" class="form-control" id="namaMapel" value="<?php echo "$data[nama_matapelajaran]"; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="mata_pelajaran.php" class="btn btn-danger">Batal</a>
        </form>
    </div>
</div>

<!-- Modal untuk Pilih Guru -->
<div id="guruModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Guru</h5>
                <button type="button" class="btn-close" onclick="closeGuruModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tampil_guru = "SELECT * FROM `guru`";
                        $hasil_guru = mysqli_query($koneksi, $tampil_guru);
                        while ($data_guru = mysqli_fetch_array($hasil_guru)) {
                            echo "<tr>
                                    <td>{$data_guru['nip']}</td>
                                    <td>{$data_guru['nama_guru']}</td>
                                    <td><button type='button' onclick=\"pilihGuru('{$data_guru['nip']}', '{$data_guru['nama_guru']}')\" class='btn btn-primary'>Pilih</button></td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Pilih Kelas -->
<div id="kelasModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Kelas</h5>
                <button type="button" class="btn-close" onclick="closeKelasModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tampil_kelas = "SELECT * FROM `kelas`";
                        $hasil_kelas = mysqli_query($koneksi, $tampil_kelas);
                        while ($data_kelas = mysqli_fetch_array($hasil_kelas)) {
                            echo "<tr>
                                    <td>{$data_kelas['id_kelas']}</td>
                                    <td>{$data_kelas['nama_kelas']}</td>
                                    <td><button type='button' onclick=\"pilihKelas('{$data_kelas['id_kelas']}', '{$data_kelas['nama_kelas']}')\" class='btn btn-primary'>Pilih</button></td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
// Fungsi untuk membuka dan menutup modal
function openGuruModal() { document.getElementById('guruModal').style.display = 'block'; }
function closeGuruModal() { document.getElementById('guruModal').style.display = 'none'; }
function openKelasModal() { document.getElementById('kelasModal').style.display = 'block'; }
function closeKelasModal() { document.getElementById('kelasModal').style.display = 'none'; }

// Fungsi untuk memilih guru dan kelas
function pilihGuru(nip) { document.getElementById('guruInput').value = nip; closeGuruModal(); }
function pilihKelas(id) { document.getElementById('kelasInput').value = id; closeKelasModal(); }
</script>


    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ilmu komputer 2024</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- Modal Konfirmasi Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <!-- Icon Peringatan Besar -->
                <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
            </div>
            <div class="modal-body text-center">
                <h5 class="modal-title mb-3" id="logoutModalLabel">Apakah Anda yakin ingin keluar?</h5>
            </div>
            <div class="modal-footer justify-content-center">
            <a id="confirmLogoutBtn" href="logout.php" class="btn btn-primary">
            <i class="fa fa-sign-out-alt mr-2"></i> Ya, Keluar</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
