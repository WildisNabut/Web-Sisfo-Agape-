
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>SMK TERPADU</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="SMK TERPADU" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="../css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="../css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="../css/swipebox.css">
<link rel="stylesheet" href="../css/jquery-ui.css" />
<link rel="stylesheet" href="../css/roma.css"/>
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>

<?php include ('navigasi3.php'); ?>

<div class="clearfix"> </div> 
<!-- Murid -->
<div id="Edit_Murid">
	<div class="container">
    <h3 class="w3l-title cl"> Murid </h3>
    <div class="container margin-atas">
	
    <?php
include('../koneksi.php');

// Cek apakah NISN sudah ada (jika sedang mengedit data)
$NISN = isset($_GET['NISN']) ? $_GET['NISN'] : '';
$data_lama = [];

if ($NISN) {
    $query = "SELECT * FROM `murid` WHERE `NISN` = '$NISN'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $data_lama = mysqli_fetch_assoc($result);
    }
}
?>

   <form class="form-group" action="Proses_Tambah_Murid.php" method="post" onSubmit="">
    <table class="table">
    
    <tr>
        <td> NISN : </td>
        <td> <input type="text" name="NISN" maxlength="10" onkeypress="return hanyaAngka(event)" size="10" required="" 
                    value="<?php echo isset($data_lama['NISN']) ? $data_lama['NISN'] : ''; ?>"> </td>
    </tr>
    
    <tr>
        <td> Nama : </td>
        <td> <input type="text" name="Nama" 
                    value="<?php echo isset($data_lama['Nama']) ? $data_lama['Nama'] : ''; ?>"> </td>
    </tr>
    
    <tr>
        <td>Username:</td>
        <td>
            <input type="text" name="Username" id="usernameInput" readonly
                   value="<?php echo isset($data_lama['Username']) ? $data_lama['Username'] : ''; ?>">
            <button type="button" class="btn btn-secondary" onclick="openUsernameModal()">Pilih</button>
        </td>
    </tr>
    
    <tr>
        <td> Alamat : </td>
        <td> <input type="text" name="Kota" 
                    value="<?php echo isset($data_lama['Kota']) ? $data_lama['Kota'] : ''; ?>"> </td>
    </tr>
    
    <tr>
        <td> Jenis Kelamin : </td>
        <td>
            <select name="Jenis_Kelamin">
                <option value="Laki-Laki" <?php echo isset($data_lama['Jenis_Kelamin']) && $data_lama['Jenis_Kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                <option value="Perempuan" <?php echo isset($data_lama['Jenis_Kelamin']) && $data_lama['Jenis_Kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </td>
    </tr>
    
    <tr>
        <td> Agama : </td>
        <td>
            <select name="Agama">
                <option value="Islam" <?php echo isset($data_lama['Agama']) && $data_lama['Agama'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                <option value="Kristen" <?php echo isset($data_lama['Agama']) && $data_lama['Agama'] == 'Kristen' ? 'selected' : ''; ?>>Kristen</option>
                <option value="Katolik" <?php echo isset($data_lama['Agama']) && $data_lama['Agama'] == 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                <option value="Hindu" <?php echo isset($data_lama['Agama']) && $data_lama['Agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                <option value="Buddha" <?php echo isset($data_lama['Agama']) && $data_lama['Agama'] == 'Buddha' ? 'selected' : ''; ?>>Buddha</option>
                <option value="Kong_Hu_Cu" <?php echo isset($data_lama['Agama']) && $data_lama['Agama'] == 'Kong_Hu_Cu' ? 'selected' : ''; ?>>Kong Hu Cu</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Kelas:</td>
        <td>
            <input type="text" name="id_kelas" id="kelasInput" readonly 
                   value="<?php echo isset($data_lama['id_kelas']) ? $data_lama['id_kelas'] : ''; ?>">
            <button type="button" class="btn btn-secondary" onclick="openKelasModal()">Pilih</button>
        </td>
    </tr>
    </table>
    
    <button class="btn btn-primary"> Simpan </button>
    <a href="murid.php" class="btn btn-primary"> Batal </a>
</form>


    
    </div>
        
    <div class="clearfix margin-bawah"></div>
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
            // Query untuk menampilkan data kelas di modal
            include('../koneksi.php');
            $tampil_kelas = "SELECT * FROM `kelas`";
            $hasil_kelas = mysqli_query($koneksi, $tampil_kelas);

            while ($data_kelas = mysqli_fetch_array($hasil_kelas)) {
                echo "<tr>
                        <td>{$data_kelas['id_kelas']}</td>
                        <td>{$data_kelas['nama_kelas']}</td>
                        <td><button type='button' onclick=\"pilihKelas('{$data_kelas['id_kelas']}', '{$data_kelas['nama_kelas']}')\" class='btn btn-primary'>Pilih</button></td>
                    </tr>";
            }
            ?>
        </table>
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
            // Query untuk menampilkan akun dengan level 3
            include('../koneksi.php');
            $tampil_akun = "SELECT * FROM `akun` WHERE `level` = 3";  // Pastikan kolom level ada di tabel akun
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

<script>
// Fungsi untuk membuka modal kelas
function openKelasModal() {
    document.getElementById('kelasModal').style.display = 'block';
}

// Fungsi untuk menutup modal kelas
function closeKelasModal() {
    document.getElementById('kelasModal').style.display = 'none';
}

// Fungsi untuk memilih kelas dan memasukkan ID kelas ke input
function pilihKelas(id_kelas, nama_kelas) {
    document.getElementById('kelasInput').value = id_kelas;  // Mengisi input dengan ID kelas
    closeKelasModal();  // Menutup modal setelah memilih
}


// Fungsi untuk membuka modal
function openGuruModal() {
    document.getElementById('guruModal').style.display = 'block';
}

// Fungsi untuk menutup modal
function closeGuruModal() {
    document.getElementById('guruModal').style.display = 'none';
}

// Fungsi untuk memilih guru dan memasukkan NIP ke input form
function pilihGuru(nip) {
    // Masukkan NIP guru ke input
    document.getElementById('guruInput').value = nip;
    closeGuruModal(); // Menutup modal setelah memilih
}


// Fungsi untuk membuka modal username
function openUsernameModal() {
    document.getElementById('usernameModal').style.display = 'block';
}

// Fungsi untuk menutup modal username
function closeUsernameModal() {
    document.getElementById('usernameModal').style.display = 'none';
}

// Fungsi untuk memilih username dan memasukkan ke input
function pilihUsername(username) {
    document.getElementById('usernameInput').value = username;  // Mengisi input dengan username
    closeUsernameModal();  // Menutup modal setelah memilih
}

</script>

<style>
/* Style untuk modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 20% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 70%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>

<script type="text/javascript">
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}
</script>

<!-- //Murid -->

<!-- Footer Section -->
<footer>
  <div class="footer">
    <!-- Info Sekolah -->
    <div class="footer-section">
      <h3>SMP Agape Indah</h3>
      <p class="fp">
        SMP Agape Indah adalah sekolah menengah pertama yang berlokasi di [lokasi Anda]. Sama seperti SMP lainnya di Indonesia, SMP Agape Indah menawarkan program pendidikan untuk siswa dari kelas VII hingga kelas IX.
      </p>
      <p class="fp"><strong>Alamat:</strong> Jl. Contoh, Kota Contoh, Provinsi Contoh, Indonesia</p>
      <p class="fp"><strong>Email:</strong> smpagapeindah@example.com</p>
      <div class="social-icons">

      <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17445.841308163348!2d123.60862167630117!3d-10.16776760510314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c56835992a6fbf3%3A0xc4b28a965a40d8b!2sSekolah%20Menengah%20Pertama%20Agape%20Indah!5e0!3m2!1sid!2sid!4v1730387975655!5m2!1sid!2sid"
      class="responsive-map"
      style="border: 0"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe> 
      </div>
    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    &copy; Copyright SMP Agape Indah 2024. All Rights Reserved.
  </div>
</footer>
  <!-- //footer -->

<!-- js-scripts -->			
<!-- js-files -->
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js-files -->
<!-- Baneer-js -->



<!-- smooth scrolling -->
<script src="../js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<!-- stats -->
<script type="text/javascript" src="../js/numscroller-1.0.js"></script>
<!-- //stats -->
<!-- moving-top scrolling -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //moving-top scrolling -->
<!-- gallery popup -->
<script src="../js/jquery.swipebox.min.js"></script> 
<script type="text/javascript">
jQuery(function($) {
	$(".swipebox").swipebox();
});
</script>
<!-- //gallery popup -->
<!--/script-->
	<script src="../js/simplePlayer.js"></script>
			<script>
				$("document").ready(function() {
					$("#video").simplePlayer();
				});
			</script>
<!-- //Baneer-js -->
<!-- Calendar -->
<script src="../js/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#datepicker" ).datepicker();
	 });
	</script>
<!-- //Calendar -->	

<!-- //js-scripts -->
</body>
</html>