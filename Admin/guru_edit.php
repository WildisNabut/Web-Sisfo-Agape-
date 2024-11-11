<?php include('../koneksi.php');?>
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

  <h4 class="modal-title mx-auto">Form Edit Data Guru</h4>

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


        
<!-- Konten -->
<!-- Edit Guru -->
<div id="Edit_Akun">
    <div class="container">
        <div class="container margin-atas">
            
            <?php
            $Kode = $_GET['kode'];
            $query = mysqli_query($koneksi, "SELECT * FROM guru WHERE nip='$Kode'");
            $data = mysqli_fetch_array($query);

            $tampil_akun = "SELECT * FROM `akun` ORDER BY `username` ASC";
            $hasil_akun = mysqli_query($koneksi, $tampil_akun);
            ?>

            <form class="form-group" action="Proses_Edit_Guru.php" method="post">
                <!-- Input NIP Lama -->
                <div class="form-group row">
                    <label for="nipLama" class="col-sm-2 col-form-label">NIP Lama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nipLama" name="nip_lama" value="<?php echo $data['nip']; ?>" readonly>
                    </div>
                </div>

                <!-- Input NIP Baru -->
                <div class="form-group row">
                    <label for="nipBaru" class="col-sm-2 col-form-label">NIP Baru</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nipBaru" name="nip" maxlength="10" onkeypress="return hanyaAngka(event)" placeholder="<?php echo $data['nip']; ?>">
                    </div>
                </div>

                <!-- Input Nama Guru -->
                <div class="form-group row">
                    <label for="namaGuru" class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaGuru" name="nama_guru" value="<?php echo $data['nama_guru']; ?>">
                    </div>
                </div>

                <!-- Select Username -->
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="username" name="Username">
                            <option value="<?php echo $data['username']; ?>" selected><?php echo $data['username']; ?></option>
                            <?php while ($data_akun = mysqli_fetch_array($hasil_akun)) { ?>
                                <option value="<?php echo $data_akun['username']; ?>"><?php echo $data_akun['username']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <!-- Input No Telepon -->
                <div class="form-group row">
                    <label for="noTelp" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="noTelp" name="no_tlp" value="<?php echo $data['no_hp']; ?>" onkeypress="return hanyaAngka(event)">
                    </div>
                </div>

                <!-- Select Jenis Kelamin -->
                <div class="form-group row">
                    <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenisKelamin" name="Jenis_Kelamin">
                            <option value="Laki-Laki" <?php if ($data['jenkel'] == "Laki-Laki") echo "selected"; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if ($data['jenkel'] == "Perempuan") echo "selected"; ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- Select Agama -->
                <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="agama" name="Agama">
                            <option value="Islam" <?php if ($data['agama'] == "Islam") echo "selected"; ?>>Islam</option>
                            <option value="Kristen" <?php if ($data['agama'] == "Kristen") echo "selected"; ?>>Kristen</option>
                            <option value="Katolik" <?php if ($data['agama'] == "Katolik") echo "selected"; ?>>Katolik</option>
                            <option value="Hindu" <?php if ($data['agama'] == "Hindu") echo "selected"; ?>>Hindu</option>
                            <option value="Buddha" <?php if ($data['agama'] == "Buddha") echo "selected"; ?>>Buddha</option>
                            <option value="Kong_Hu_Cu" <?php if ($data['agama'] == "Kong_Hu_Cu") echo "selected"; ?>>Kong Hu Cu</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
						          <a href="guru.php" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix margin-bawah"></div>
    </div>
</div>

<script type="text/javascript">
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
}
</script>
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
