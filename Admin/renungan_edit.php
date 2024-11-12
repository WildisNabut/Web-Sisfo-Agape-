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

  <h4 class="modal-title mx-auto">Form Edit Data Siswa</h4>

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


        
<div class="container-fluid">
    <div id="Edit_Akun">
    <?php
      $Kode = $_GET['kode'];
      $query = mysqli_query($koneksi, "SELECT * FROM renungan WHERE judul='$Kode'");
      $data = mysqli_fetch_array($query);
      ?>
        <div class="container">
            <div class="container margin-atas">

                <form class="form-group" action="Proses_edit_renungan.php" method="post">

                    <!-- Judul -->
                    <div class="form-group row">
                        <label for="inputJudul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" maxlength="100" placeholder="<?php echo "$data[judul]"; ?>">
                        </div>
                    </div>

                    <!-- Ayat Alkitab -->
                    <div class="form-group row">
                        <label for="inputAyat" class="col-sm-2 col-form-label">Ayat Alkitab</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ayat" placeholder="Ayat Alkitab" value="<?php echo $data['ayat']; ?>" required>
                        </div>
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group row">
                        <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal" value="<?php echo $data['tanggal']; ?>" required>
                        </div>
                    </div>

                    <!-- Isi Renungan -->
                    <div class="form-group row">
                        <label for="inputIsi" class="col-sm-2 col-form-label">Isi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="isi" rows="5" placeholder="Isi Renungan" required><?php echo $data['isi']; ?></textarea>
                        </div>
                    </div>

                    <!-- Tombol Simpan dan Batal -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="renungan.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk Pilih Kelas -->
    <div id="kelasModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeKelasModal()">&times;</span>
            <h3>Pilih Kelas</h3>
            <table class="table table-bordered text-center">
                <tr>
                    <td><b>ID Kelas</b></td>
                    <td><b>Nama Kelas</b></td>
                    <td><b>Aksi</b></td>
                </tr>
                <?php
                $tampil_kelas = "SELECT * FROM `kelas`";
                $hasil_kelas = mysqli_query($koneksi, $tampil_kelas);

                while ($data_kelas = mysqli_fetch_array($hasil_kelas)) {
                    echo "<tr>
                            <td>{$data_kelas['id_kelas']}</td>
                            <td>{$data_kelas['nama_kelas']}</td>
                            <td><button type='button' onclick=\"pilihKelas('{$data_kelas['id_kelas']}')\" class='btn btn-primary'>Pilih</button></td>
                          </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>


<script>
// Fungsi untuk membuka dan menutup modal
function openKelasModal() {
    document.getElementById('kelasModal').style.display = 'block';
}
function closeKelasModal() {
    document.getElementById('kelasModal').style.display = 'none';
}
function openUsernameModal() {
    document.getElementById('usernameModal').style.display = 'block';
}
function closeUsernameModal() {
    document.getElementById('usernameModal').style.display = 'none';
}

// Fungsi untuk memilih kelas dan memasukkan ID kelas ke input
function pilihKelas(id_kelas) {
    document.getElementById('kelasInput').value = id_kelas;
    closeKelasModal();
}

// Fungsi untuk memilih username dan memasukkan ke input
function pilihUsername(username) {
    document.getElementById('usernameInput').value = username;
    closeUsernameModal();
}
</script>


    </div>
    <!-- End of Content Wrapper -->

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
