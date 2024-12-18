<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding untuk dokumen HTML -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Membuat halaman responsif sesuai dengan perangkat -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Memastikan kompatibilitas dengan Internet Explorer -->
    <title>RR BEAUTY</title> <!-- Judul halaman yang muncul di tab browser -->
    <link rel="icon" href="source/rr_logo.jpg" type="image/png"> <!-- Menambahkan ikon untuk halaman -->
    <link rel="stylesheet" href="css/home.css"> <!-- Menghubungkan file CSS eksternal -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet"> <!-- Mengimpor font dari Google Fonts -->
    <style>
        /* Efek animasi saat elemen masuk viewport */
        .menu-item,
        .description,
        .image-container,
        footer .footer-info {
            opacity: 0; /* Awalnya elemen transparan */
            transform: translateY(20px); /* Elemen bergeser ke bawah */
            transition: opacity 0.5s ease, transform 0.5s ease; /* Efek transisi */
        }

        /* Efek hover: elemen muncul sepenuhnya */
        .menu-item:hover,
        .description:hover,
        .image-container:hover,
        footer .footer-info:hover {
            opacity: 1; /* Menjadikan elemen terlihat */
            transform: translateY(0); /* Menghilangkan pergeseran */
        }

        /* Animasi untuk bagian utama dan menu */
        .main-content .left-section,
        .main-content .right-section,
        #menu,
        #menu2 {
            opacity: 0; /* Awalnya transparan */
            transform: translateY(50px); /* Bergeser lebih jauh ke bawah */
            transition: opacity 0.8s ease, transform 0.8s ease; /* Transisi lebih lambat */
        }

        /* Menambahkan kelas 'visible' untuk elemen yang terlihat */
        .main-content .left-section.visible,
        .main-content .right-section.visible,
        #menu.visible,
        #menu2.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Efek hover langsung terlihat */
        .hover-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    </style>
</head>
<body>
    <header>
        <div class="container"> <!-- Kontainer untuk header -->
            <div class="logo">
                <img src="source/rr_logo2.png" alt="Logo"> <!-- Menampilkan logo -->
            </div>
            <nav class="header-nav"> <!-- Navigasi utama -->
                <a href="#menu">Menu</a> <!-- Link menuju menu -->
                <a href="#menu2">About</a> <!-- Link menuju bagian About -->
                <a href="detail_keccantikan/rambut.php">Rambut</a> <!-- Link ke detail kecantikan rambut -->
                <a href="detail_keccantikan/makeup.php">Makeup</a> <!-- Link ke detail kecantikan makeup -->
                <a href="detail_keccantikan/spa.php">Spa</a> <!-- Link ke detail kecantikan spa -->
                <a target="_blank" href="https://web.whatsapp.com/">Contact</a> <!-- Link menuju WhatsApp Web -->
            </nav>
            <nav class="auth-nav"> <!-- Navigasi untuk autentikasi -->
                <a href="login_page.php" class="login-btn">Login</a> <!-- Link menuju halaman login -->
                <a href="register.php" class="signup-btn">Sign Up</a> <!-- Link menuju halaman pendaftaran -->
            </nav>
        </div>
    </header>

    <section class="main-content"> <!-- Bagian konten utama -->
        <div class="left-section">
            <img src="source/kecantikan1.jfif" alt="Left Image"> <!-- Gambar bagian kiri -->
        </div>
        <div class="right-section">
            <img src="source/produk1.jfif" alt="Product Image"> <!-- Gambar produk pertama -->
        </div>
        <div class="right-section">
            <img src="source/spa1.jfif" alt="Product Image"> <!-- Gambar produk kedua -->
        </div>
    </section>

    <div id="menu"> <!-- Bagian menu -->
        <h2>Salon Kecantikan RR Beauty</h2>
        <p>Layanan Kecantikan Rambut, Wajah, & Tubuh</p>
        <div class="container1"> <!-- Kontainer untuk item menu -->
            <div class="menu-item"> <!-- Item menu pertama -->
                <img src="source/eyelash.jpg" alt="Eyelash"> <!-- Gambar eyelash -->
                <a href="detail_keccantikan/mode_rambut.html">Eyelash</a> <!-- Link ke detail eyelash -->
            </div>
            <div class="menu-item">
                <img src="source/spa2.jfif" alt="Spa">
                <a href="detail_keccantikan/perawatan_spa.html">Spa</a>
            </div>
            <div class="menu-item">
                <img src="source/manicure.jpg" alt="Manicure">
                <a href="detail_keccantikan/model_menicure.html">Manicure</a>
            </div>
            <div class="menu-item">
                <img src="source/model_rambut3.jpg" alt="Rambut">
                <a href="detail_keccantikan/mode_rambut.html">Rambut</a>
            </div>
            <div class="menu-item">
                <img src="source/produk2.jfif" alt="produk">
                <a href="detail_keccantikan/mode_rambut.html">Produk</a>
            </div>
        </div>
    </div>

    <div id="menu2"> <!-- Bagian About -->
        <div class="description">
            <h2><i>RR Beauty</i></h2> <!-- Judul bagian -->
            <p>"RR Beauty adalah salon kecantikan yang menghadirkan berbagai layanan profesional untuk memenuhi kebutuhan kecantikan Anda. 
        Kami menawarkan perawatan rambut seperti potong rambut, pewarnaan, smoothing, dan hair spa untuk menjaga keindahan dan kesehatan rambut Anda. 
        Selain itu, tersedia layanan makeup untuk berbagai acara spesial, mulai dari pesta, pernikahan, hingga photoshoot profesional."</p> <!-- Deskripsi tentang RR Beauty -->
        </div>
        <div class="image-container">
            <img src="source/tekstur.jfif" alt="Contoh Gambar"> <!-- Gambar tambahan -->
        </div>
    </div>

    <footer> <!-- Bagian footer -->
        <div class="footer-container">
            <div class="footer-info">
                <h3>Lokasi</h3> <!-- Informasi lokasi -->
                <p>Jl. Veteran Selatan, Kota Makassar</p>
                <iframe src="https://www.google.com/maps/embed?..."></iframe> <!-- Peta lokasi -->
            </div>
            <div class="footer-info">
                <h3>Jam Operasional</h3>
                <p>Senin - Jumat : 09:00 - 17:00</p>
                <p>Sabtu - Minggu: 09:00 - 15:00</p>
            </div>
            <div class="footer-info">
                <h3>Kontak Kami</h3>
                <p>Telepon: 0813-9872-3072</p>
                <p>Email: RRBeauty@gmail.com</p>
            </div>
        </div>
    </footer>

    <script>
        // Fungsi untuk memeriksa apakah elemen terlihat di layar
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (rect.top <= window.innerHeight && rect.bottom >= 0);
        }

        // Fungsi untuk menambahkan kelas 'visible' pada elemen
        function handleScrollAnimation() {
            const elements = document.querySelectorAll('.left-section, .right-section, #menu, #menu2');
            
            elements.forEach(function (el) {
                if (isElementInViewport(el)) {
                    el.classList.add('visible'); // Menambahkan kelas 'visible'
                }
            });
        }

        // Fungsi untuk menampilkan elemen saat mouse masuk
        function handleMouseEnter() {
            const elements = document.querySelectorAll('.menu-item, .description, .image-container, footer .footer-info');
            elements.forEach(function (el) {
                el.classList.add('hover-visible');
            });
        }

        // Event listener untuk mouse masuk
        document.body.addEventListener('mouseenter', handleMouseEnter);

        // Jalankan animasi scroll saat halaman digulir
        window.addEventListener('scroll', handleScrollAnimation);

        // Jalankan sekali saat halaman dimuat
        document.addEventListener('DOMContentLoaded', handleScrollAnimation);
    </script>
</body>
</html>
