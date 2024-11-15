<?php include ('autentikasi.php'); ?> 
<?php include ('../koneksi.php'); ?> 

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

  <h5 class="modal-title mx-auto">Tugas</h5>
  <!-- User Dropdown (aligned to right) -->
  <ul class="navbar-nav ml-auto">
  <!-- Divider between Message and User icons -->
  <div class="topbar-divider d-none d-sm-block"></div>
  <?php
@session_start();
if (!isset($_SESSION['username'])) {
    echo "<ul class='agile_forms'></ul>";
} else {
    echo "
    <ul class='agile_forms'>
        <div class='d-flex align-items-center position-relative'>
            <!-- Nama Pengguna -->
            <span class='ml-3' onmouseover='showCard()' onmouseout='hideCard()' data-toggle='modal' data-target='#userModal'>" . $_SESSION['username'] . "</span>
            
            <!-- Profil lingkaran -->
            <div class='rounded-circle bg-primary text-white d-flex align-items-center justify-content-center' style='width: 40px; height: 40px; cursor: pointer;'> <!-- Menambahkan cursor: pointer -->
                <span class='font-weight-bold'>" . strtoupper(substr($_SESSION['username'], 0, 1)) . "</span>
            </div>
        </div>
    </ul>";
}
?>
  </ul>
</nav>
<!-- End of Topbar -->

<!-- konten yang ingin diubah -->
<div class="container-fluid">

    <!-- Form untuk Tambah Tugas -->
    <form class="form-group" action="Proses_Tambah_Tugas.php" method="post">
        
        <!-- Input tersembunyi untuk Username -->
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
        
        <!-- Input tersembunyi untuk ID Tugas -->
        <input type="hidden" name="id_tugas" value="<?php echo uniqid(); ?>">
        
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

                    <!-- Mata Pelajaran -->
                        <div class="form-group row">
                        <label for="mapelInput" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="kode_mata_pelajaran" id="mapelInput" readonly>
                        </div>
                        <div class="col-sm-2">
                        <button type="button" class="btn btn-secondary" onclick="openMapelModal()">Pilih</button>
                        </div>
                    </div>

        <!-- Nama Tugas -->
        <div class="form-group row">
            <label for="inputNamaTugas" class="col-sm-2 col-form-label">Nama Tugas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNamaTugas" name="nama_tugas" required>
            </div>
        </div>

        <!-- Deskripsi Tugas -->
        <div class="form-group row">
            <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="inputDeskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
        </div>

        <!-- Tanggal dan Waktu Selesai -->
        <div class="form-group row">
            <label for="inputTanggalSelesai" class="col-sm-2 col-form-label">Tanggal & Waktu Selesai</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="inputTanggalSelesai" name="tanggal_selesai" required>
            </div>
        </div>

        <!-- Input tersembunyi untuk Status -->
        <input type="hidden" name="status" value="Sedang Berlangsung">

        <!-- Buttons untuk Simpan dan Batal -->
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </div>

    </form>
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

<!-- Overlay dan Modal untuk Pilih Mata Pelajaran -->
<div id="mapelModalOverlay" onclick="closeMapelModal()" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5);"></div>
<div id="mapelModal" style="display:none; position:fixed; top:20%; left:50%; transform:translate(-50%, 0); background:white; padding:20px; border-radius:8px;">
    <h3>Pilih Mata Pelajaran</h3>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $username = $_SESSION['username']; // Mendapatkan username dari session
            
            // Query untuk mengambil data mata pelajaran dan nama kelas terkait
            $tampil_mapel = "SELECT mp.kode_mata_pelajaran, mp.nama_matapelajaran, k.nama_kelas
                            FROM mata_pelajaran mp 
                            JOIN kelas k ON mp.id_kelas = k.id_kelas";
            
            $hasil_mapel = mysqli_query($koneksi, $tampil_mapel);

            while ($data_mapel = mysqli_fetch_array($hasil_mapel)) {
                echo "<tr>
                        <td>{$data_mapel['nama_matapelajaran']}</td>
                        <td><button type='button' class='btn btn-primary' onclick=\"pilihMapel('{$data_mapel['kode_mata_pelajaran']}')\">Pilih</button></td>
                    </tr>";
            }
            ?>
        </tbody>

    </table>
    <button type="button" class="btn btn-secondary" onclick="closeMapelModal()">Tutup</button>
</div>

<!-- JavaScript untuk membuka dan menutup modal serta memilih username dan kelas -->
<script>
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

// Fungsi untuk membuka dan menutup modal mata pelajaran
function openMapelModal() {
    document.getElementById("mapelModalOverlay").style.display = "block";
    document.getElementById("mapelModal").style.display = "block";
}

function closeMapelModal() {
    document.getElementById("mapelModalOverlay").style.display = "none";
    document.getElementById("mapelModal").style.display = "none";
}

// Fungsi untuk memilih mata pelajaran dan memasukkan kode mata pelajaran ke input
function pilihMapel(kode_mata_pelajaran) {
    document.getElementById("mapelInput").value = kode_mata_pelajaran;
    closeMapelModal();
}
</script>

 <!-- Modal Konfirmasi Hapus -->

 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <!-- Icon Peringatan Besar -->
                <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
            </div>
            <div class="modal-body text-center">
                <h5 class="modal-title mb-3" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <p>Apakah Anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a id="confirmDeleteBtn" href="#" class="btn btn-primary">Ya, Hapus</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Modal Hapus -->
<script>
    function showDeleteModal(id) {
        // Set URL dengan ID data untuk dihapus
        document.getElementById('confirmDeleteBtn').href = 'hapus_kutipan.php?kode=' + id;
        
        // Tampilkan modal
        $('#deleteModal').modal('show');
    }
</script>
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
                <!-- Tombol konfirmasi Logout -->
                <a id="confirmLogoutBtn" href="logout.php" class="btn btn-primary">
                    <i class="fa fa-sign-out-alt mr-2"></i> Ya, Keluar
                </a>
                <!-- Tombol Batal -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>



<!-- JS Bootstrap (disarankan di akhir body) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
