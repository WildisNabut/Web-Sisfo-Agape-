<?php
include ('../koneksi.php');
?>
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}
?>
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

  <h4 class="modal-title mx-auto">Data Mata Pelajaran</h4>

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
<!-- Tambah Mata Pelajaran -->
<div id="Edit_Akun" class="container my-5">

    <?php
    include('../koneksi.php');
    
    // Query untuk mengambil data guru
    $tampil_guru = "SELECT * FROM `guru`";
    $hasil_guru = mysqli_query($koneksi, $tampil_guru);
    ?>

    <form action="Proses_Input_Mata_Pelajaran.php" method="post">
        <!-- Kode Mata Pelajaran -->
        <div class="form-group row mb-3">
            <label for="Kode" class="col-sm-3 col-form-label">Kode Mata Pelajaran</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="Kode" onkeypress="return hanyaAngka(event)" required>
            </div>
        </div>

        <!-- Nama Mata Pelajaran -->
        <div class="form-group row mb-3">
            <label for="Nama_Mata_Pelajaran" class="col-sm-3 col-form-label">Nama Mata Pelajaran</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="Nama_Mata_Pelajaran" required>
            </div>
        </div>

        <!-- Nama Guru -->
        <div class="form-group row mb-3">
            <label for="guruInput" class="col-sm-3 col-form-label">Nama Guru</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="guruInput" name="NIP" readonly>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-secondary" onclick="openGuruModal()">Pilih</button>
            </div>
        </div>

        <!-- Kelas -->
        <div class="form-group row mb-3">
            <label for="kelasInput" class="col-sm-3 col-form-label">Kelas</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="kelasInput" name="id_kelas" readonly>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-secondary" onclick="openKelasModal()">Pilih</button>
            </div>
        </div>

        <!-- Tombol Simpan dan Batal -->
        <div class="form-group row">
            <div class="col-sm-9 offset-sm-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="mata_pelajaran.php" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>
</div>

<!-- Modal untuk Pilih Kelas -->
<div id="kelasModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Kelas</h5>
                <button type="button" class="close" onclick="closeKelasModal()">&times;</button>
            </div>
            <div class="modal-body">
                <a href="tambah_kelas.php" class="btn btn-primary mb-3">Tambah Kelas</a>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Query untuk menampilkan data kelas di modal
                    $tampil_kelas = "SELECT * FROM `kelas`";
                    $hasil_kelas = mysqli_query($koneksi, $tampil_kelas);

                    while ($data_kelas = mysqli_fetch_array($hasil_kelas)) {
                        echo "<tr>
                                <td>{$data_kelas['id_kelas']}</td>
                                <td>{$data_kelas['nama_kelas']}</td>
                                <td><button type='button' class='btn btn-success' onclick=\"pilihKelas('{$data_kelas['id_kelas']}')\">Pilih</button></td>
                              </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Pilih Nama Guru -->
<div id="guruModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Guru</h5>
                <button type="button" class="close" onclick="closeGuruModal()">&times;</button>
            </div>
            <div class="modal-body">
                <a href="tambah_guru.php" class="btn btn-primary mb-3">Tambah Guru</a>
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
                    // Query untuk menampilkan data guru di modal
                    $tampil_guru = "SELECT * FROM `guru`";
                    $hasil_guru = mysqli_query($koneksi, $tampil_guru);

                    while ($data_guru = mysqli_fetch_array($hasil_guru)) {
                        echo "<tr>
                                <td>{$data_guru['nip']}</td>
                                <td>{$data_guru['nama_guru']}</td>
                                <td><button type='button' class='btn btn-success' onclick=\"pilihGuru('{$data_guru['nip']}')\">Pilih</button></td>
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
// Fungsi untuk membuka dan menutup modal kelas
function openKelasModal() {
    document.getElementById('kelasModal').style.display = 'block';
}
function closeKelasModal() {
    document.getElementById('kelasModal').style.display = 'none';
}
function pilihKelas(id) {
    document.getElementById('kelasInput').value = id;
    closeKelasModal();
}

// Fungsi untuk membuka dan menutup modal guru
function openGuruModal() {
    document.getElementById('guruModal').style.display = 'block';
}
function closeGuruModal() {
    document.getElementById('guruModal').style.display = 'none';
}
function pilihGuru(nip) {
    document.getElementById('guruInput').value = nip;
    closeGuruModal();
}
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
