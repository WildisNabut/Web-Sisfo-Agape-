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
        <div class="container">
            <div class="container margin-atas">
                <?php
                $Kode = $_GET['kode'];
                $query = mysqli_query($koneksi, "SELECT * FROM murid WHERE nisn='$Kode'");
                $data = mysqli_fetch_array($query);
                ?>

                <form class="form-group" action="Proses_Edit_Murid.php" method="post">
                    <!-- NISN Lama -->
                    <div class="form-group row">
                        <label for="inputnis" class="col-sm-2 col-form-label">NISN Lama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputnis" name="NISN_Lama" size="8" value="<?php echo "$data[nisn]"; ?>" readonly>
                        </div>
                    </div>

                    <!-- NISN Baru -->
                    <div class="form-group row">
                        <label for="inputnisbaru" class="col-sm-2 col-form-label">NISN Baru</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="NISN" maxlength="10" onkeypress="return hanyaAngka(event)" size="8" placeholder="<?php echo "$data[nisn]"; ?>">
                        </div>
                    </div>

                    <!-- Nama -->
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Nama" value="<?php echo "$data[nama_murid]"; ?>">
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="form-group row">
                        <label for="usernameInput" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="Username" id="usernameInput" readonly>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-secondary" onclick="openUsernameModal()">Pilih</button>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Kota" value="<?php echo "$data[kota]"; ?>">
                        </div>
                    </div>

                    <!-- Kolom Jenis Kelamin -->
					<div class="form-group row">
						<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-10">
							<select name="Jenis_Kelamin" class="form-control" id="jenis_kelamin">
								<option value="Laki-Laki" <?php echo $data['jenkel'] == "Laki-Laki" ? 'selected' : ''; ?>>Laki-Laki</option>
								<option value="Perempuan" <?php echo $data['jenkel'] == "Perempuan" ? 'selected' : ''; ?>>Perempuan</option>
							</select>
						</div>
					</div>

                   <!-- Kolom Agama -->
					<div class="form-group row">
						<label for="agama" class="col-sm-2 col-form-label">Agama</label>
						<div class="col-sm-10">
							<select name="Agama" class="form-control" id="agama">
								<?php
									$agama_options = ["Islam", "Kristen", "Katolik", "Hindu", "Buddha", "Kong Hu Cu"];
									foreach ($agama_options as $agama) {
										$selected = ($data['agama'] == $agama) ? 'selected' : '';
										echo "<option value='$agama' $selected>$agama</option>";
									}
								?>
							</select>
						</div>
					</div>

                    <!-- Kelas -->
                    <div class="form-group row">
                        <label for="kelasInput" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="id_kelas" id="kelasInput" readonly>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-secondary" onclick="openKelasModal()">Pilih</button>
                        </div>
                    </div>

                    <!-- Submit and Cancel buttons -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="murid.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk Pilih Username -->
    <div id="usernameModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeUsernameModal()">&times;</span>
            <h3>Pilih Username (Level 3)</h3>
            <table class="table table-bordered text-center">
                <tr>
                    <td><b>Username</b></td>
                    <td><b>Aksi</b></td>
                </tr>
                <?php
                $tampil_akun = "SELECT * FROM `akun` WHERE `level` = 3";
                $hasil_akun = mysqli_query($koneksi, $tampil_akun);

                while ($data_akun = mysqli_fetch_array($hasil_akun)) {
                    echo "<tr>
                            <td>{$data_akun['username']}</td>
                            <td><button type='button' onclick=\"pilihUsername('{$data_akun['username']}')\" class='btn btn-primary'>Pilih</button></td>
                          </tr>";
                }
                ?>
            </table>
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