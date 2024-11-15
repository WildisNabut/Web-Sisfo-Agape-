<!DOCTYPE html>
<html lang="zxx">
<head>
<title>SMP AGAPE INDAH</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Scholarly web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/swipebox.css">
<link rel="stylesheet" href="css/roma.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css" />
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>

<?php include ('napigasi.php'); ?>
<style>
/* styles.css */

/* Reset dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Font dan Warna Dasar */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7fb;
    color: #444;
    line-height: 1.6;
    scroll-behavior: smooth;
}

/* Header */
header {
    background: linear-gradient(135deg, #2a7ec1, #00c7c7);
    color: #fff;
    padding: 80px 20px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    position: relative;
}

header h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 10px;
}

header p {
    font-size: 1.2rem;
    margin-top: 10px;
}

/* Hero Image */
header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    opacity: 0.4;
    z-index: -1;
}




/* Section */
section {
    padding: 60px 20px;
    margin: 30px auto;
    max-width: 1100px;
    background-color: #ffffff;
    transition: transform 0.3s ease, opacity 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
}

/* Efek animasi fade-in */
section.visible {
    opacity: 1;
    transform: translateY(0);
}

section h2 {
    font-size: 2.5rem;
    color: #2a7ec1;
    margin-bottom: 20px;
    border-bottom: 2px solid #00c7c7;
    padding-bottom: 10px;
}

section h3 {
    font-size: 1.5rem;
    color: #333;
    margin-top: 20px;
}

section ul {
    list-style: none;
    padding-left: 20px;
    margin-top: 10px;
}

section ul li {
    margin-bottom: 10px;
    color: #666;
    font-family: 'Arial', sans-serif;
    font-size: 1.1rem;
    line-height: 1.8;
}

section p {
    font-size: 1.1rem;
    color: #444;
    margin-top: 10px;
}

/* styles.css */

/* Section untuk gambar struktur organisasi */
#struktur-gambar {
    padding: 40px;
    background-color: #f4f8fb;
    text-align: center;
    margin-bottom: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

#struktur-gambar h2 {
    font-size: 2.5rem;
    color: #2a7ec1;
    margin-bottom: 20px;
    text-transform: uppercase;
    font-weight: 700;
}

.struktur-gambar img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

/* Responsif: Sesuaikan gambar di layar kecil */
@media (max-width: 768px) {
    .struktur-gambar img {
        width: 80%; /* Atur gambar agar lebih kecil di layar kecil */
    }
}


/* Menambahkan elemen visual untuk visi dan misi */
#visi-misi {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

#visi-misi h2 {
    color: #2a7ec1;
    font-size: 2.5rem;
    margin-bottom: 20px;
    text-align: center;
}

#visi-misi h3 {
    color: #00c7c7;
    font-size: 1.8rem;
    margin-top: 20px;
}

#visi-misi ul {
    list-style: none;
    padding-left: 0;
}

#visi-misi ul li {
    color: #444;
    font-size: 1.2rem;
    line-height: 1.6;
    margin-bottom: 15px;
}

/* Scroll to Top Button */
#scrollTop {
    position: fixed;
    bottom: 25px;
    right: 25px;
    background-color: #00c7c7;
    color: #fff;
    border: none;
    border-radius: 50%;
    padding: 15px;
    font-size: 1.8rem;
    cursor: pointer;
    display: none;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    transition: background-color 0.3s ease;
}

#scrollTop:hover {
    background-color: #009f99;
}



/* Responsif untuk perangkat kecil */
@media (max-width: 768px) {
    header h1 {
        font-size: 2.2rem;
    }
    section {
        padding: 40px 15px;
    }
    #struktur-organisasi ul {
        flex-direction: column;
        align-items: center;
    }
    #struktur-organisasi li {
        width: 80%;
    }
}
/* styles.css */

/* Animasi untuk elemen yang muncul dan hilang */
section {
    opacity: 0; /* Awalnya elemen tidak terlihat */
    transform: translateY(50px); /* Elemen dimulai dengan posisi lebih rendah */
    transition: opacity 0.5s ease, transform 0.5s ease; /* Efek transisi */
}

/* Class yang ditambahkan ketika elemen terlihat */
section.visible {
    opacity: 1; /* Ketika elemen muncul */
    transform: translateY(0); /* Kembali ke posisi normal */
}

/* Tombol Scroll ke Atas */
#scrollTop {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background-color: #2a7ec1;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 50%;
    font-size: 1.5rem;
    cursor: pointer;
    display: none; /* Sembunyikan tombol saat halaman pertama kali dimuat */
}

#scrollTop:hover {
    background-color: #1e6c96;
}

/* styles.css */

/* Mengatur layout agar gambar di kiri dan teks di kanan */
.content {
    display: flex;
    align-items: flex-start; /* Menjaga gambar dan teks tetap sejajar secara vertikal */
    justify-content: space-between;
    margin-bottom: 40px;
}

/* Gambar berada di kiri */
.image {
    flex: 0 1 40%; /* Gambar mengambil 40% dari ruang, bisa disesuaikan */
    margin-right: 20px; /* Memberikan jarak antara gambar dan teks */
    max-height: 100%;
}

.image img {
    width: 100%;
    height: auto; /* Menjaga aspek rasio gambar */


    opacity: 0;
    transform: translateX(-50px); /* Posisi gambar dimulai dari kiri */
    animation: imageAnimation 1s forwards; /* Menambahkan animasi */
}

/* Teks berada di kanan */
.text {
    flex: 1; /* Teks mengambil ruang yang lebih besar */
    max-width: 55%; /* Memberikan ruang terbatas untuk teks, menyesuaikan dengan gambar */
}

.text p, .text ul {
    opacity: 0;
    transform: translateX(50px); /* Teks dimulai dari sebelah kanan */
    animation: textAnimation 1s forwards; /* Menambahkan animasi */
}

/* Animasi untuk gambar */
@keyframes imageAnimation {
    0% {
        opacity: 0;
        transform: translateX(-50px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Animasi untuk teks */
@keyframes textAnimation {
    0% {
        opacity: 0;
        transform: translateX(50px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Menyesuaikan layout di layar kecil */
@media (max-width: 768px) {
    .content {
        flex-direction: column; /* Gambar dan teks akan ditempatkan satu di bawah yang lain */
        align-items: center; /* Menyelaraskan gambar dan teks di tengah */
    }

    .image {
        max-height: 300px; /* Membatasi ukuran gambar di layar kecil */
        width: 80%;
        margin-bottom: 20px; /* Memberikan ruang antara gambar dan teks */
    }

    .text {
        max-width: 100%; /* Menyesuaikan teks dengan lebar penuh */
    }
}

</style>
<section id="struktur-gambar">
        <h2>Struktur Organisasi</h2>
        <div class="struktur-gambar">
            <img src="images/animasi\struktur-organisasi.png" alt="Struktur Organisasi">
        </div>
    </section>
    
    <section id="identitas">
        <h2>Identitas Sekolah</h2>
        <div class="content">
            <div class="image">
                <img src="images/animasi/visi.gif" width="10px">
            </div>
            <div class="text">
                <p><strong>Nama Sekolah:</strong> SMP KRISTEN AGAPE INDAH KUPANG </p>
                <p><strong>Alamat:</strong> Jl. TDM V No.11, Oebufu, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85228</p>
                <p><strong>Kontak:</strong> (021) 123-4567 | info@smpagapekupang.ac.id</p>
                <p><strong>Tahun Berdiri:</strong> 2017</p>
                <p><strong>Akreditasi:</strong> A (Sangat Baik)</p>
                
            </div>
        </div>
    </section>
    
    <section id="visi-misi">
        <h2>Visi & Misi Sekolah</h2>
        <div class="content">
            <div class="image">
                <img src="images/animasi/identitas.gif" alt="Visi Misi Sekolah">
            </div>
            <div class="text">
                <h3>Visi</h3>
                <p>Menciptakan generasi yang unggul, berkarakter, dan berwawasan global.</p>
                <h3>Misi</h3>
                <ul>
                    <li>Memberikan pendidikan berkualitas dengan pendekatan holistik.</li>
                    <li>Menumbuhkan rasa tanggung jawab dan integritas pada siswa.</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section id="program">
        <h2>Program Akademik & Ekstrakurikuler</h2>
        <div class="content">
            <div class="image">
                <img src="images/animasi/ekstrak.gif" alt="Program Akademik">
            </div>
            <div class="text">
                <p>Kami menawarkan berbagai program akademik serta kegiatan ekstrakurikuler yang mendukung pengembangan siswa secara menyeluruh.</p>
                <h3>Ekstrakurikuler</h3>
                <ul>
                    <li>Olahraga: Sepak Bola, Basket, Voli</li>
                    <li>Musik: Paduan Suara, Orkestra</li>
                    <li>Keahlian: Karya Ilmiah, Jurnalistik</li>
                </ul>
            </div>
        </div>
    </section>
    
    <!-- Scroll to Top Button -->
    <button id="scrollTop" onclick="scrollToTop()">↑</button>
    <script>

   // Fungsi animasi fade-in untuk setiap section
const sections = document.querySelectorAll('section');

function checkVisibility() {
    const triggerBottom = window.innerHeight / 5 * 4; // Ketika bagian atas elemen sudah mencapai 80% viewport
    sections.forEach(section => {
        const sectionTop = section.getBoundingClientRect().top;
        if (sectionTop < triggerBottom) {
            section.classList.add('visible'); // Menambahkan class visible jika elemen muncul di viewport
        } else {
            section.classList.remove('visible'); // Menghapus class visible jika elemen keluar dari viewport
        }
    });
}

// Memanggil fungsi saat menggulir halaman
window.addEventListener('scroll', checkVisibility);

// Fungsi untuk scroll ke atas
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Fungsi untuk menampilkan tombol scroll ke atas
window.addEventListener('scroll', () => {
    const scrollTopButton = document.getElementById('scrollTop');
    if (window.scrollY > 300) {
        scrollTopButton.style.display = 'block'; // Menampilkan tombol scroll ke atas jika halaman digulir lebih dari 300px
    } else {
        scrollTopButton.style.display = 'none'; // Menyembunyikan tombol jika halaman digulir ke atas
    }
});

</script>
 <!-- Footer Section -->
 <?php include('footer.php'); ?>

<!-- //footer -->

<!-- js-scripts -->			
<!-- js-files -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js-files -->
<!-- Baneer-js -->


<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<!-- stats -->
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //stats -->
<!-- moving-top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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
<script src="js/jquery.swipebox.min.js"></script> 
<script type="text/javascript">
jQuery(function($) {
	$(".swipebox").swipebox();
});
</script>
<!-- //gallery popup -->
<!--/script-->
	<script src="js/simplePlayer.js"></script>
			<script>
				$("document").ready(function() {
					$("#video").simplePlayer();
				});
			</script>
<!-- //Baneer-js -->
<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#datepicker" ).datepicker();
	 });
	</script>
<!-- //Calendar -->	

<!-- //js-scripts -->
</body>
</html>