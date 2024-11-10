<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>SMP AGAPE INDAH</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="SMK TERPADU" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="../css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="../css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
	<link rel="stylesheet" href="../css/swipebox.css">
	<link rel="stylesheet" href="../css/jquery-ui.css" />
	<link rel="stylesheet" href="../css/roma.css" />
	<!-- //css files -->
	<!-- online-fonts -->
	<link href="//fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!-- //online-fonts -->
</head>

<body>

<?php include ('navigasi3.php'); ?>
	<div class="clearfix"> </div>

	<!-- Edit Mata Pelajaran -->
	<div id="Edit_Akun">
		<div class="container">
			<h3 class="w3l-title cl"> Edit Mata Pelajaran </h3>
			<div class="container margin-atas">

				<?php
				include('../koneksi.php');
				$tampil = "SELECT * FROM `guru`";
				$hasil = mysqli_query($koneksi, $tampil);

				$Kode = $_GET['kode'];
				$query = mysqli_query($koneksi, "select * from mata_pelajaran where kode_mata_pelajaran='$Kode'");
				$data = mysqli_fetch_array($query);

				$tampil_guru = "SELECT * FROM `guru` where nip = '$data[nip]'";
				$hasil_guru = mysqli_query($koneksi, $tampil_guru);
				$data_guru2 = mysqli_fetch_array($hasil_guru);

				$tampil_kelas = "SELECT * FROM `kelas` WHERE id_kelas = '$data[id_kelas]'";
				$hasil_kelas = mysqli_query($koneksi, $tampil_kelas);
				$data_kelas = mysqli_fetch_array($hasil_kelas);
				?>

				<form class="form-group" action="Proses_Edit_Mata_Pelajaran.php" method="post">
					<table class="table">
						<tr>
							<td> Kode Mata Pelajaran : </td>
							<td> <input type="text" name="Kode_lama" onkeypress="return hanyaAngka(event)" value="<?php echo "$Kode"; ?>" Readonly> </td>
						</tr>

						<tr>
							<td> Kode Mata Pelajaran Baru : </td>
							<td> <input type="text" name="Kode_mapel" onkeypress="return hanyaAngka(event)" placeholder="<?php echo "$Kode"; ?>"> </td>
						</tr>

						<tr>
							<td> Nama Mata Pelajaran : </td>
							<td> <input type="text" name="Nama_Mata_Pelajaran" value="<?php echo "$data[nama_matapelajaran]"; ?>"> </td>
						</tr>

						<tr>
                        <td> Nama Guru : </td>
                        <td>
                            <!-- Input untuk menampilkan NIP guru yang dipilih, readonly agar tidak bisa diisi manual -->
                            <input type="text" id="guruInput" name="NIP" readonly>
                            <!-- Tombol untuk membuka modal nama guru -->
                            <button type="button" class="btn btn-secondary" onclick="openGuruModal()">Pilih</button>
                        </td>
                    </tr>
                    <tr>

						<tr>
						<td>Kelas:</td>
						<td>
							<input type="text" name="id_kelas" id="kelasInput" readonly>
							<button type="button" class="btn btn-secondary" onclick="openKelasModal()">Pilih</button>
						</td>
					</tr>

					</table>

					<button class="btn btn-primary"> Simpan </button>
					<a href="mata_pelajaran.php" class="btn btn-primary"> Batal </a>
				</form>

			</div>

			<div class="clearfix margin-bawah"></div>
		</div>
	</div>

<!-- Modal untuk Pilih Guru -->
<div id="guruModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeGuruModal()">&times;</span>
        <h3>Pilih Guru</h3>
        
        <table class="table table-bordered text-center">
            <tr>
                <td><b>NIP</b></td>
                <td><b>Nama Guru</b></td>
                <td><b>Aksi</b></td>
            </tr>

            <?php
            // Query untuk menampilkan data guru di modal
            include('../koneksi.php');
            $tampil_guru = "SELECT * FROM `guru`";
            $hasil_guru = mysqli_query($koneksi, $tampil_guru);

            while ($data_guru = mysqli_fetch_array($hasil_guru)) {
                echo "<tr>
                        <td>{$data_guru['nip']}</td>
                        <td>{$data_guru['nama_guru']}</td>
                        <td><button type='button' onclick=\"pilihGuru('{$data_guru['nip']}', '{$data_guru['nama_guru']}')\" class='btn btn-primary'>Pilih</button></td>
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

<script>
// Fungsi untuk membuka modal
function openKelasModal() {
    document.getElementById('kelasModal').style.display = 'block';
}

// Fungsi untuk menutup modal
function closeKelasModal() {
    document.getElementById('kelasModal').style.display = 'none';
}

// Fungsi untuk memilih kelas dan memasukkan ID kelas ke input form
function pilihKelas(id) {
    document.getElementById('kelasInput').value = id; // Masukkan ID kelas ke input
    closeKelasModal();
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
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
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

	<!-- //Edit Mata Pelajaran -->

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
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
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
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
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
			$("#datepicker").datepicker();
		});
	</script>
	<!-- //Calendar -->

	<!-- //js-scripts -->
</body>

</html>