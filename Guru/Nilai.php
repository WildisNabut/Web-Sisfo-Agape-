<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>SMP AGAPE INDAH</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Scholarly web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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

	<?php include('../Admin/napigasi2.php'); ?>
	<div class="clearfix"> </div>

	<?php
include "../koneksi.php";

$cari_guru = "SELECT * FROM `guru` WHERE username= '$_SESSION[username]'";
$hasil_guru = mysqli_query($koneksi, $cari_guru);
$data_guru = mysqli_fetch_array($hasil_guru);

$kode_mata_pelajaran = $_POST['kode_mata_pelajaran'];
$nama_mata_pelajaran = $_POST['nama_mata_pelajaran'];
$nama_kelas = $_POST['nama_kelas'];

$mapel = "SELECT * FROM `mata_pelajaran` WHERE nip = '$data_guru[nip]' AND kode_mata_pelajaran = '$kode_mata_pelajaran'";
$hasil_mapel = mysqli_query($koneksi, $mapel);
$data_mapel = mysqli_fetch_array($hasil_mapel);
?>

<div id="Input Nilai">
    <div class="container roma-batasan">
        <form action="process_guru.php" method="post">
            Nama Mata Pelajaran: <input type="text" name="Nama_Mata_Pelajaran" value="<?php echo $nama_mata_pelajaran; ?>" readonly><br><br>
            Kelas: <input type="text" name="Kelas" value="<?php echo $nama_kelas; ?>" size='2' readonly><br><br>

            <table class="table table-bordered">
                <tr>
                    <td width="150" align="center">NISN</td>
                    <td width="150" align="center">Nama Murid</td>
                    <td width="80" align="center">Nilai UTS</td>
                    <td width="80" align="center">Nilai UAS</td>
                </tr>

                <?php
                $tampil_murid = "SELECT * FROM murid WHERE id_kelas = '$data_mapel[id_kelas]'";
                $hasil_murid = mysqli_query($koneksi, $tampil_murid);

                while ($data_murid = mysqli_fetch_array($hasil_murid)) {
                    $nilai_UTS = $data_nilai['nilai_UTS'] ?? "";
                    $nilai_UAS = $data_nilai['nilai_UAS'] ?? "";

                    echo "
                    <tr>
                        <td>$data_murid[nisn]</td>
                        <td><input type='text' name='nama_murid[]' value='$data_murid[nama_murid]' readonly></td>
                        <td align='center'><input type='text' name='nilai_UTS[]' value='$nilai_UTS' maxlength='3' size='1'></td>
                        <td align='center'><input type='text' name='nilai_UAS[]' value='$nilai_UAS' maxlength='3' size='1'></td>
                    </tr>
                    ";
                }
                ?>
            </table>
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

	<!-- //Laporan Nilai -->

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