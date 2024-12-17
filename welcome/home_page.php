<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata dasar untuk browser -->
    <meta charset="UTF-8"> <!-- Mengatur encoding karakter -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Membuat tampilan responsif di perangkat berbeda -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Kompatibilitas dengan Internet Explorer -->
    <title>RR BEAUTY</title> <!-- Judul halaman di tab browser -->
    <link rel="icon" href="source/rr_logo.jpg" type="image/png"> <!-- Ikon kecil di tab browser (favicon) -->
    
    <!-- Menghubungkan file CSS eksternal -->
    <link rel="stylesheet" href="css/home.css">

    <!-- Menghubungkan font dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header bagian atas halaman -->
    <header>
        <div class="container"> <!-- Kontainer utama untuk layout header -->
            <div class="logo">
                <img src="source/rr_logo2.png" alt="Logo"> <!-- Gambar logo salon -->
            </div>
            <!-- Navigasi utama halaman -->
            <nav class="header-nav">
                <a href="#menu">Menu</a> <!-- Link menuju bagian menu -->
                <a href="#menu2">About</a> <!-- Link menuju bagian about -->
                <a href="detail_keccantikan/rambut.html">Rambut</a> <!-- Link menuju halaman detail rambut -->
                <a href="detail_keccantikan/makeup.php">Makeup</a> <!-- Link menuju halaman detail makeup -->
                <a href="detail_keccantikan/spa.html">Spa</a> <!-- Link menuju halaman detail spa -->
                <a target="_blank" href="https://web.whatsapp.com/">Contact</a> <!-- Link menuju WhatsApp Web -->
            </nav>
            <!-- Navigasi untuk login dan sign up -->
            <nav class="auth-nav">
                <a href="login_page.php" class="login-btn">Login</a> <!-- Link ke halaman login -->
                <a href="register.php" class="signup-btn">Sign Up</a> <!-- Link ke halaman registrasi -->
            </nav>
        </div>
    </header>

    <!-- Bagian konten utama halaman -->
    <section class="main-content">
        <!-- Gambar di sisi kiri -->
        <div class="left-section">
            <img src="source/kecantikan1.jfif" alt="Left Image"> <!-- Gambar kecantikan -->
        </div>
        <!-- Gambar di sisi kanan -->
        <div class="right-section">
            <img src="source/produk1.jfif" alt="Product Image"> <!-- Gambar produk kecantikan -->
        </div>
        <div class="right-section">
            <img src="source/spa1.jfif" alt="Product Image"> <!-- Gambar layanan spa -->
        </div>
    </section>

    <!-- Bagian Menu -->
    <div id="menu">
        <h2>Salon Kecantikan RR Beauty</h2> <!-- Judul bagian menu -->
        <p>Layanan Kecantikan Rambut, Wajah, & Tubuh</p> <!-- Deskripsi singkat layanan -->
        <div class="container1"> <!-- Kontainer untuk daftar layanan -->
            <div class="menu-item">
                <img src="source/eyelash.jpg" alt="Eyelash"> <!-- Gambar Eyelash -->
                <a href="detail_keccantikan/mode_rambut.html">Eyelash</a> <!-- Link menuju detail eyelash -->
            </div>
            <div class="menu-item">
                <img src="source/spa2.jfif" alt="Spa"> <!-- Gambar Spa -->
                <a href="detail_keccantikan/perawatan_spa.html">Spa</a> <!-- Link menuju detail spa -->
            </div>
            <div class="menu-item">
                <img src="source/manicure.jpg" alt="Manicure"> <!-- Gambar Manicure -->
                <a href="detail_keccantikan/model_menicure.html">Manicure</a> <!-- Link menuju detail manicure -->
            </div>
            <div class="menu-item">
                <img src="source/model_rambut3.jpg" alt="Rambut"> <!-- Gambar Rambut -->
                <a href="detail_keccantikan/mode_rambut.html">Rambut</a> <!-- Link menuju detail rambut -->
            </div>
            <div class="menu-item">
                <img src="source/produk2.jfif" alt="produk"> <!-- Gambar Produk -->
                <a href="detail_keccantikan/mode_rambut.html">Produk</a> <!-- Link menuju detail produk -->
            </div>
        </div>
    </div>

    <!-- Bagian About -->
    <div id="menu2">
        <!-- Deskripsi layanan RR Beauty -->
        <div class="description">
            <h2><i>RR Beauty</i></h2> <!-- Judul -->
            <p>
                "RR Beauty adalah salon kecantikan yang menyediakan layanan profesional untuk rambut, 
                makeup, serta perawatan kecantikan lainnya,
                dengan tujuan memberikan tampilan terbaik dan memanjakan pelanggan dengan hasil yang memuaskan."
            </p>
        </div>
        <!-- Gambar ilustrasi di sebelah kanan -->
        <div class="image-container">
            <img src="source/tekstur.jfif" alt="Contoh Gambar"> <!-- Gambar pendukung -->
        </div>
    </div>
    
    <!-- Footer bagian bawah -->
    <footer>
        <div class="footer-container"> <!-- Kontainer utama footer -->
            <!-- Bagian lokasi -->
            <div class="footer-info">
                <h3>Lokasi</h3> <!-- Judul -->
                <p>Jl. Veteran Selatan No. 10, Makassar, Indonesia</p> <!-- Alamat -->
                <!-- Google Maps iframe -->
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.5014193344565!2d119.42071971477875!3d-5.147665596259062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd26ec4dbad9%3A0xc7c1d1be27d91cdd!2sJl.%20Veteran%20Sel.%20No.10%2C%20Mamajang%20Dalam%2C%20Kec.%20Mamajang%2C%20Kota%20Makassar%2C%20Sulawesi%20Selatan%2090125%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1698422062348!5m2!1sen!2sid" 
                width="300" 
                height="200" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            </div>
    
            <!-- Bagian jam operasional -->
            <div class="footer-info">
                <h3>Jam Operasional</h3> <!-- Judul -->
                <p>Senin - Jumat: 09.00 - 18.00</p> <!-- Jadwal buka -->
                <p>Sabtu - Minggu: 10.00 - 16.00</p>
            </div>
    
            <!-- Bagian kontak -->
            <div class="footer-info">
                <h3>Kontak Kami</h3> <!-- Judul -->
                <p>Telepon: +62 812 3456 7890</p> <!-- Nomor telepon -->
                <p>Email: info@rrbeauty.com</p> <!-- Email kontak -->
            </div>
        </div>
    </footer>

</body>
</html>
