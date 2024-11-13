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
