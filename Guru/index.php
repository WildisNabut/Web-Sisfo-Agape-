<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>SMK TERPADU</title>
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
	<link rel="stylesheet" href="css/beranda.css" />

	<!-- //css files -->
	<!-- online-fonts -->
	<link href="//fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!-- //online-fonts -->
</head>

<body>

	<?php include('../Admin/napigasi2.php'); ?>
	<div class="clearfix"> </div>

<!-- Pilih Mata Pelajaran -->
<div id="Pilih_Mata_Pelajaran">
    <div class="container roma-batasan">
        <table class="table roma-table" border="1">
            <tr>
                <th>Kode Mata Pelajaran</th>
                <th>Nama Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
            
            <?php
            include('../koneksi.php');

            $cari_guru = "SELECT * FROM `guru` WHERE username= '$_SESSION[username]'";
            $hasil_guru = mysqli_query($koneksi, $cari_guru);
            $data_guru = mysqli_fetch_array($hasil_guru);

            $tampil = "
                SELECT mp.kode_mata_pelajaran, mp.nama_matapelajaran, k.nama_kelas 
                FROM mata_pelajaran AS mp
                JOIN kelas AS k ON mp.id_kelas = k.id_kelas
                WHERE mp.nip = '$data_guru[nip]'
            ";
            $hasil = mysqli_query($koneksi, $tampil);

            while ($data = mysqli_fetch_array($hasil)) {
                $kode = $data['kode_mata_pelajaran'];
                $nama = $data['nama_matapelajaran'];
                $kelas = $data['nama_kelas'];
                
                echo "
                    <tr>
                        <td>$kode</td>
                        <td>$nama</td>
                        <td>$kelas</td>
                        <td>
                            <form action='Nilai.php' method='post' style='display:inline;'>
                                <input type='hidden' name='kode_mata_pelajaran' value='$kode'>
                                <input type='hidden' name='nama_mata_pelajaran' value='$nama'>
                                <input type='hidden' name='nama_kelas' value='$kelas'>
                                <button type='submit' class='btn btn-primary'>Input Nilai</button>
                            </form>
                        </td>
                    </tr>
                ";
            }
            ?>
        </table>
    </div>
</div>



  <!-- Footer Section -->
<footer>
  <div class="footer">
    <!-- Info Sekolah -->
    <div class="footer-section">
      <h3>SMP Agape Indah</h3>
      <p>
        SMP Agape Indah adalah sekolah menengah pertama yang berlokasi di [lokasi Anda]. Sama seperti SMP lainnya di Indonesia, SMP Agape Indah menawarkan program pendidikan untuk siswa dari kelas VII hingga kelas IX.
      </p>
      <p><strong>Alamat:</strong> Jl. Contoh, Kota Contoh, Provinsi Contoh, Indonesia</p>
      <p><strong>Email:</strong> smpagapeindah@example.com</p>
      <div class="social-icons">
	  <a href="#"><i class="fa fa-facebook icon-small"></i></a>
      <a href="#"><i class="fa fa-youtube icon-small"></i></a>
      <a href="https://www.instagram.com/smpkagapeindah?igsh=MThtejJxN3Ywem54aw==">
        <i class="fa fa-instagram icon-small"></i>
      </div>
    </div>
    
    <!-- Peta Lokasi -->
    <div class="footer-section map">

      <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17445.841308163348!2d123.60862167630117!3d-10.16776760510314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c56835992a6fbf3%3A0xc4b28a965a40d8b!2sSekolah%20Menengah%20Pertama%20Agape%20Indah!5e0!3m2!1sid!2sid!4v1730387975655!5m2!1sid!2sid"
      class="responsive-map"
      style="border: 0"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    &copy; Copyright SMP Agape Indah 2024. All Rights Reserved.
  </div>
</footer>

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