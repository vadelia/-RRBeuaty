<?php
session_start();

// Cek apakah pengguna sudah login (pastikan sesi 'username' ada)
if (!isset($_SESSION['username'])) {
    // Jika tidak login, arahkan ke halaman login
    header("Location: login_page.php");
    exit();
}

// Cek apakah pengguna memiliki role yang sesuai
if ($_SESSION['role'] !== 'Admin') {
    // Jika bukan Admin, arahkan ke user dashboard
    header("Location: user_dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <a href="logout.php" class="logout-button">Keluar</a> <!-- Tambahkan tombol Keluar -->
        <h1>Manajemen Pegawai RR Beauty</h1>
    </header>
    
    <div class="dashboard-container">
        <div class="profile-section">
            <div class="profile-info">
                <img src="source/profil2.jpg" alt="Profile" class="profile-pic">
                <h2><?php echo htmlspecialchars($_SESSION['username']); ?></h2> <!-- Tampilkan nama pengguna dari session -->
                <p>Administrator</p>
            </div>
            <div class="stats">
                <div class="stat-card">
                    <h3>Average Score</h3>
                    <p>72.5</p>
                </div>
                <div class="stat-card">
                    <h3>Attendance</h3>
                    <p>80%</p>
                </div>
                <div class="stat-card">
                    <h3>Grades</h3>
                    <p>A</p>
                </div>
            </div>
        </div>

        <div class="main-section">
            <h1>Hallo! <?php echo htmlspecialchars($_SESSION['username']); ?></h1> <!-- Tampilkan username -->
            <p>Selalu Harimu Menyenangkan.</p>
            <div class="cards">
                <div class="card">
                    <h3>Data Member</h3>
                    <p>Lihat data lengkap semua Member.</p>
                    <a href="datam.php" class="button">Lihat</a>
                </div>
                <div class="card">
                    <h3>Data Pegawai</h3>
                    <p>Lihat Pegawai yang tersedia.</p>
                    <a href="dataj.php" class="button">Lihat</a>
                </div>
            </div>
        </div>
    </div>
    <script>
    let timeoutDuration = 900000; // 15 menit dalam milidetik
    let warningTime = timeoutDuration - 60000; // 1 menit sebelum timeout

    // Peringatkan pengguna sebelum sesi habis
    setTimeout(() => {
        alert("Sesi Anda hampir habis. Harap refresh halaman untuk tetap login.");
    }, warningTime);

    // Logout otomatis jika waktu habis
    setTimeout(() => {
        window.location.href = 'logout.php';
    }, timeoutDuration);
</script>
    <footer>
        <p>&copy; RR Beauty 2024</p>
    </footer>
</body>
</html>
