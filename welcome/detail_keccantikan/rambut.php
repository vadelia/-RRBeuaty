<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rambut</title>
    <style>
        body {
    background: linear-gradient(135deg, #262626, #ffb398);
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
}

header {
    background-color: #262626;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.logo img {
    max-width: 80px;
    height: auto;
    border-radius: 50%;
}

.header-nav a {
    text-decoration: none;
    color: white;
    margin: 0 10px;
}

.auth-nav a {
    text-decoration: none;
    color: white;
    border: 1px solid white;
    padding: 10px;
    border-radius: 5px;
}

/* Container gambar di atas deskripsi */
.image-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 20px 0; /* Spasi antara gambar dan konten di bawahnya */
}

.image-container img {
    max-width: 200px;
    height: auto;
    border-radius: 10px; /* Opsional untuk memberikan efek rounded */
}

.description {
    padding: 20px;
    font-size: 18px;
    color:rgb(255, 255, 255);
}

/* Responsif untuk layar kecil */
@media (max-width: 768px) {
    .image-container {
        flex-direction: column;
    }

    .image-container img {
        max-width: 100%;
    }
}

</style>
</head>
<body>
<header>
    <!-- Header dengan logo dan navigasi -->
    <div class="logo">
        <img src="../source/rr_logo2.png" alt="Logo">
    </div>
    <nav class="header-nav">
        <a href="../home_page.php">Home</a>
        <a href="#services">Services</a>
        <a href="#contact">Contact</a>
    </nav>
    <div class="auth-nav">
        <a href="../login_page.php">Login</a>
        <a href="../register.php">Register</a>
    </div>
</header>

<!-- Container untuk gambar -->
<div class="image-container">
    <img src="resource/rambut_warna.jpg" alt="Gambar 1">
    <img src="../source/salon.jfif" alt="Gambar 2">
    <img src="resource/model_rambut3.jpg" alt="Gambar 3">
</div>

<!-- Deskripsi di bawah gambar -->
<div class="description">
    <h2> Pelayanan Kecantikan Rambut</h2>
    <p>
        Kami menawarkan berbagai layanan perawatan rambut yang dirancang untuk menjaga kesehatan dan kecantikan rambut Anda. Mulai dari potongan rambut profesional, pewarnaan rambut, hingga perawatan rambut khusus seperti hair spa dan keratin treatment. 
        Tim ahli kami akan memastikan setiap pelanggan mendapatkan perawatan yang sesuai dengan jenis rambut dan kebutuhan pribadi, sehingga rambut Anda tetap sehat, berkilau, dan penuh gaya. Kami juga menggunakan produk berkualitas tinggi yang aman dan efektif, memberikan pengalaman yang nyaman dan hasil terbaik untuk rambut Anda.
    </p>
</div>
</body>
</html>
