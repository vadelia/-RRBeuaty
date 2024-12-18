<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RR BEAUTY</title>
    <link rel="icon" href="source/rr_logo.jpg" type="image/png">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .menu-item,
        .description,
        .image-container,
        footer .footer-info {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        /* Efek saat hover pada menu-item */
        .menu-item:hover,
        .description:hover,
        .image-container:hover,
        footer .footer-info:hover {
            opacity: 1;
            transform: translateY(0);
        }

        .main-content .left-section,
        .main-content .right-section,
        #menu,
        #menu2 {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .main-content .left-section.visible,
        .main-content .right-section.visible,
        #menu.visible,
        #menu2.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Efek saat kursor berada di elemen */
        .hover-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <div class="logo">
                <img src="source/rr_logo2.png" alt="Logo">
            </div>
            <nav class="header-nav">
                <a href="#menu">Menu</a>
                <a href="#menu2">About</a>
                <a href="detail_keccantikan/rambut.html">Rambut</a>
                <a href="detail_keccantikan/makeup.php">Makeup</a>
                <a href="detail_keccantikan/spa.html">Spa</a>
                <a target="_blank" href="https://web.whatsapp.com/">Contact</a>
            </nav>
            <nav class="auth-nav">
                <a href="login_page.php" class="login-btn">Login</a>
                <a href="register.php" class="signup-btn">Sign Up</a>
            </nav>
        </div>
    </header>

    <section class="main-content">
        <div class="left-section">
            <img src="source/kecantikan1.jfif" alt="Left Image">
        </div>
        <div class="right-section">
            <img src="source/produk1.jfif" alt="Product Image">
        </div>
        <div class="right-section">
            <img src="source/spa1.jfif" alt="Product Image">
        </div>
    </section>

    <div id="menu">
        <h2>Salon Kecantikan RR Beauty</h2>
        <p>Layanan Kecantikan Rambut, Wajah, & Tubuh</p>
        <div class="container1">
            <div class="menu-item">
                <img src="source/eyelash.jpg" alt="Eyelash">
                <a href="detail_keccantikan/mode_rambut.html">Eyelash</a>
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

    <div id="menu2">
        <div class="description">
            <h2><i>RR Beauty</i></h2>
            <p>"RR Beauty adalah salon kecantikan yang menyediakan layanan profesional untuk rambut, makeup, serta perawatan kecantikan lainnya, dengan tujuan memberikan tampilan terbaik dan memanjakan pelanggan dengan hasil yang memuaskan."</p>
        </div>
        <div class="image-container">
            <img src="source/tekstur.jfif" alt="Contoh Gambar">
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <h3>Lokasi</h3>
                <p>Jl. Veteran Selatan No. 10, Makassar, Indonesia</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18..."></iframe>
            </div>
            <div class="footer-info">
                <h3>Jam Operasional</h3>
                <p>Senin - Jumat: 09.00 - 18.00</p>
                <p>Sabtu - Minggu: 10.00 - 16.00</p>
            </div>
            <div class="footer-info">
                <h3>Kontak Kami</h3>
                <p>Telepon: +62 812 3456 7890</p>
                <p>Email: info@rrbeauty.com</p>
            </div>
        </div>
    </footer>

    <script>
        // Function to check if the element is in the viewport
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (rect.top <= window.innerHeight && rect.bottom >= 0);
        }

        // Function to add 'visible' class when element is in viewport
        function handleScrollAnimation() {
            const elements = document.querySelectorAll('.left-section, .right-section, #menu, #menu2');
            
            elements.forEach(function (el) {
                if (isElementInViewport(el)) {
                    el.classList.add('visible'); // Menambahkan kelas 'visible'
                }
            });
        }

        // Function to trigger hover effect when mouse enters the page area
        function handleMouseEnter() {
            const elements = document.querySelectorAll('.menu-item, .description, .image-container, footer .footer-info');
            elements.forEach(function (el) {
                el.classList.add('hover-visible');
            });
        }

        // Detect mouse enter on the body
        document.body.addEventListener('mouseenter', handleMouseEnter);

        // Jalankan fungsi saat halaman di-scroll
        window.addEventListener('scroll', handleScrollAnimation);

        // Jalankan sekali saat halaman dimuat untuk mengecek elemen yang sudah terlihat
        document.addEventListener('DOMContentLoaded', handleScrollAnimation);
    </script>

</body>
</html>
