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

  <h4 class="modal-title mx-auto">Form Tambah Siswa</h4>

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


        
 <!-- Konten -->
<!-- Input Guru -->
<!-- Konten -->
<div class="container-fluid">
    <?php 
    include ('../koneksi.php');
    $tampil = "SELECT * FROM `akun` WHERE `level` = '3' ORDER BY `username` ASC";
    $hasil = mysqli_query($koneksi, $tampil);
    ?>

    <form class="form-group" action="Proses_Tambah_Murid.php" method="post">
        <!-- Input NIP -->
        <div class="form-group row">
            <label for="inputnis" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputnis" name="NISN" required>
            </div>
        </div>

        
        <!-- Input Nama -->
        <div class="form-group row">
            <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputnama" name="Nama" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="inputalamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="inputalamat" name="Kota" rows="3"></textarea>
            </div>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-group row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="form-control" id="jenis_kelamin" name="Jenis_Kelamin">
                    <option value="Laki-Laki" selected>Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
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

        <!-- Submit and Cancel Buttons -->
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="murid.php" class="btn btn-secondary ml-2">Batal</a>
            </div>
        </div>
    </form>
</div>

<!-- Overlay dan Modal untuk Pilih Username -->
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

<!-- Overlay dan Modal untuk Pilih Kelas -->
<div id="kelasModalOverlay" onclick="closeKelasModal()" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5);"></div>
<div id="kelasModal" style="display:none; position:fixed; top:20%; left:50%; transform:translate(-50%, 0); background:white; padding:20px; border-radius:8px;">
    <h3>Pilih Kelas</h3>
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
                        <td><button type='button' class='btn btn-primary' onclick=\"pilihKelas('{$data_kelas['id_kelas']}')\">Pilih</button></td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-secondary" onclick="closeKelasModal()">Tutup</button>
</div>

<!-- JavaScript untuk membuka dan menutup modal serta memilih username dan kelas -->
<script>
    // Fungsi untuk membuka dan menutup modal username
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

    // Fungsi untuk membuka dan menutup modal kelas
    function openKelasModal() {
        document.getElementById("kelasModalOverlay").style.display = "block";
        document.getElementById("kelasModal").style.display = "block";
    }

    function closeKelasModal() {
        document.getElementById("kelasModalOverlay").style.display = "none";
        document.getElementById("kelasModal").style.display = "none";
    }

    // Fungsi untuk memilih kelas dan memasukkan ID kelas ke input
    function pilihKelas(id_kelas) {
        document.getElementById("kelasInput").value = id_kelas;
        closeKelasModal();
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
