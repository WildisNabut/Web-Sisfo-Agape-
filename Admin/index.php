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

  <h4 class="modal-title mx-auto">Dashboard Admin</h4>

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
        <div class="container-fluid">
          <!-- Page Content here -->
          <div class="row">
    <?php
    include('../koneksi.php');

    // Queries for each data type
    $queries = [
        "Akun" => "SELECT COUNT(*) as total FROM akun",
        "Guru" => "SELECT COUNT(*) as total FROM guru",
        "Siswa" => "SELECT COUNT(*) as total FROM murid",
        "Kelas" => "SELECT COUNT(*) as total FROM kelas",
        "Mata Pelajaran" => "SELECT COUNT(*) as total FROM mata_pelajaran",
    ];

    // Icons for each card
    $icons = [
        "Akun" => "fa-user",
        "Guru" => "fa-chalkboard-teacher",
        "Siswa" => "fa-user-graduate",
        "Kelas" => "fa-school",
        "Mata Pelajaran" => "fa-book",
    ];

    // Colors for each card
    $colors = [
        "Akun" => "primary",
        "Guru" => "warning",
        "Siswa" => "info",
        "Kelas" => "success",
        "Mata Pelajaran" => "danger",
    ];

    // Links for each card
    $links = [
        "Akun" => "akun.php",
        "Guru" => "guru.php",
        "Siswa" => "murid.php",
        "Kelas" => "kelas.php",
        "Mata Pelajaran" => "mata_pelajaran.php",
        
    ];

    // Loop through each type and generate a card
    foreach ($queries as $label => $query) {
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
        $icon = $icons[$label];
        $color = $colors[$label];
        $link = $links[$label];
    ?>

    <!-- Card for <?php echo $label; ?> -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-<?php echo $color; ?> shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-<?php echo $color; ?> text-uppercase mb-1"><?php echo $label; ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas <?php echo $icon; ?> fa-2x text-gray-300"></i>
                    </div>
                </div>
                <!-- More Button -->
                <a href="<?php echo $link; ?>" class="btn btn-<?php echo $color; ?> mt-3">
                    <i class="fas fa-arrow-right"></i> Lihat
                </a>
            </div>
        </div>
    </div>

    <?php } ?>
</div>

        </div>
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
