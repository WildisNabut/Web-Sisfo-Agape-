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

  <h4 class="modal-title mx-auto">Data Pengumuman</h4>

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
<div class="container-fluid">

             <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">

          <!-- Dropdown untuk memilih jumlah data per halaman -->
          <form method="POST" action="" class="form-inline">
              <div class="input-group mr-2">
                  <label for="limit" class="mr-2">Tampilkan:</label>
                  <select name="limit" id="limit" class="custom-select" onchange="this.form.submit()">
                      <option value="10" <?php if (isset($_POST['limit']) && $_POST['limit'] == 10) echo 'selected'; ?>>10</option>
                      <option value="15" <?php if (isset($_POST['limit']) && $_POST['limit'] == 25) echo 'selected'; ?>>15</option>
                      <option value="20" <?php if (isset($_POST['limit']) && $_POST['limit'] == 50) echo 'selected'; ?>>20</option>
                  </select>
              </div>
          </form>  

          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download</a>
          </div>
            </form>  

           <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <a href="tambahpengumuman.php" class="btn btn-primary">Tambah Data</a>
            <form class="form-inline" method="POST" action="">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="search" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="header-no">No</th>
                        <th class="header-judul">Judul</th>
                        <th class="header-konten">Deskripsi</th>
                        <th class="header-tanggal">Tanggal</th>
                        <th class="header-status">Status</th>
                        <th class="header-aksi text-center" colspan="2"> Aksi</tt
                    </tr>
                </thead>
                <?php
                  include '../koneksi.php';
                  $i = 1;
                  $data = mysqli_query($koneksi, "SELECT * FROM  pengumuman");
                  while($d =  mysqli_fetch_array($data) ){
                   ?>
                <tbody>
                    <tr>
                    <th> <?php echo $i++; ?> </th>
                    <th> <?php echo $d['judul']; ?> </th>
                    <th> <?php echo $d['dekripsi']; ?> </th>
                    <th> <?php echo $d['tanggal']; ?> </th>
                    <th> <?php echo $d['status']; ?> </th>
                    <th class='text-center' width='100'>
                            <a href='pengumuman_edit.php?kode=<?php echo $d['judul']; ?>' class='btn btn-success'>Edit</a>
                        </th>
                        <th class='text-center' width='100'>
                        <button class='btn btn-danger' onclick="showDeleteModal('<?php echo $d['judul']; ?>')">Hapus</button>
                         </th>  
                    </tr>
                    <?php
                     }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

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
        document.getElementById('confirmDeleteBtn').href = 'Hapus_pengumuman.php?kode=' + id;
        
        // Tampilkan modal
        $('#deleteModal').modal('show');
    }
</script>





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
