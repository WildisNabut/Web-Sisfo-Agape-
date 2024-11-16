<?php include('../koneksi.php');?>
<?php include ('autentikasi.php'); ?> 
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

          <!-- Form Username dengan tombol Pilih -->
          <div class="form-group row">
              <label for="usernameInput" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control" name="username" id="username" readonly>
              </div>
              <div class="col-sm-2">
                  <button type="button" class="btn btn-secondary" onclick="openAccountModal()">Pilih</button>
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
<div id="modalOverlay" onclick="closeAccountModal()" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5); z-index: 999;"></div>

<div id="accountModal" style="display:none; position:fixed; top:20%; left:50%; transform:translate(-50%, 0); background:white; padding:20px; border-radius:8px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); z-index: 1000;">
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

// Fungsi untuk memilih username dan menutup modal
function selectUsername(username) {
    // Mengisi input username dengan username yang dipilih
    document.getElementById("username").value = username;
    closeAccountModal();
}

// Fungsi untuk membuka dan menutup modal kelas (jika diperlukan)
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
