<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    exit();
}

// Cek apakah pengguna memiliki role admin
if ($_SESSION['role'] !== 'Admin') {
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
        <a href="logout.php" class="logout-button">Keluar</a>
        <h1>Manajemen Pegawai RR Beauty</h1>
    </header>
    
    <div class="dashboard-container">
        <div class="profile-section">
            <div class="profile-info">
                <!-- Tampilkan Foto Profil -->
                <img src="<?php echo isset($_SESSION['photo']) ? 'uploads/' . $_SESSION['photo'] : 'source/profil2.jpg'; ?>" alt="Profile" class="profile-pic">
                <h2><?php echo htmlspecialchars($_SESSION['username']); ?></h2>
                <p>Administrator</p>
                
                <!-- Form untuk Edit Foto -->
                <form action="upload_photo.php" method="post" enctype="multipart/form-data">
                    <label for="profile_photo">Ganti Foto:</label>
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*" required>
                    <button type="submit">Unggah</button>
                </form>
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
            <h1>Hallo! <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            <p>Semoga harimu menyenangkan.</p>
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
    <footer>
        <p>&copy; RR Beauty 2024</p>
    </footer>
</body>
</html>
