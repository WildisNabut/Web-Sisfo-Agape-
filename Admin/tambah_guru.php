<?php include('../koneksi.php');?>
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
      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Nav Item - Renungan -->
      <li class="nav-item">
        <a class="nav-link" href="pengumuman.php">
          <i class="fas fa-fw fa-fill"></i>
          <span>Pengumuman</span>
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

  <h4 class="modal-title mx-auto">Form Tambah Guru</h4>

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


        
 <!-- Konten -->
<!-- Input Guru -->
<!-- Konten -->
<div class="container-fluid">
    <?php 
    include ('../koneksi.php');
    $tampil = "SELECT * FROM `akun` WHERE `level` = '2' ORDER BY `username` ASC";
    $hasil = mysqli_query($koneksi, $tampil);
    ?>

    <form class="form-group" action="Proses_Tambah_Guru.php" method="post">
        <!-- Input NIP -->
        <div class="form-group row">
            <label for="inputnip" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputnip" name="nip" required>
            </div>
        </div>

        
        <!-- Input Nama -->
        <div class="form-group row">
            <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputnama" name="nama_guru" required>
            </div>
        </div>

        <!-- No Telepon -->
        <div class="form-group row">
            <label for="No_HP" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="No_HP" name="no_tlp" onkeypress="return hanyaAngka(event)">
            </div>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-group row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-Laki" selected>Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <!-- Agama -->
        <div class="form-group row">
            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
                <select class="form-control" id="agama" name="agama">
                    <option value="Islam" selected>Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Kong_Hu_Cu">Kong Hu Cu</option>
                </select>
            </div>
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="guru.php" class="btn btn-secondary ml-2">Batal</a>
            </div>
        </div>
    </form>
</div>

<!-- Overlay dan Modal untuk menampilkan tabel akun -->
<div id="modalOverlay" onclick="closeAccountModal()" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5);"></div>
<div id="accountModal" style="display:none; position:fixed; top:20%; left:50%; transform:translate(-50%, 0); background:white; padding:20px; border-radius:8px;">
    <h3>Pilih Username</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($data = mysqli_fetch_array($hasil)) {
                echo "<tr>";
                echo "<td>" . $data['username'] . "</td>";
                echo "<td><button type='button' class='btn btn-primary' onclick=\"selectUsername('" . $data['username'] . "')\">Pilih</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-secondary" onclick="closeAccountModal()">Tutup</button>
</div>

<!-- JavaScript untuk membuka dan menutup modal serta memilih username -->
<script>
    function openAccountModal() {
        document.getElementById("modalOverlay").style.display = "block";
        document.getElementById("accountModal").style.display = "block";
    }

    function closeAccountModal() {
        document.getElementById("modalOverlay").style.display = "none";
        document.getElementById("accountModal").style.display = "none";
    }

    function selectUsername(username) {
        document.getElementById("selectedUsername").value = username;
        closeAccountModal();
    }
</script>

<!-- JavaScript untuk memastikan input hanya angka -->
<script type="text/javascript">
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return (charCode >= 48 && charCode <= 57);
}
</script>


<!-- //Admin Pannel -->
<!-- Akhir dari Konten -->




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
