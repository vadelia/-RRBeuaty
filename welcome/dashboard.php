<?php
session_start();

// Waktu timeout dalam detik (5 menit = 300 detik)
$timeout_duration = 300;

// Cek apakah ada aktivitas terakhir yang tercatat
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    // Jika waktu sesi telah habis, hapus semua data sesi dan arahkan ke login
    session_unset();
    session_destroy();
    header("Location: login_page.php?timeout=true"); // Kirim parameter timeout
    exit();
}

// Perbarui waktu aktivitas terakhir
$_SESSION['last_activity'] = time();

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
    <style>
        /* Gaya halaman sama seperti sebelumnya */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #262626, #ffb398);
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background: #262626;
            padding: 20px;
            text-align: center;
            color: white;
            position: relative;
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ffffff;
            color: #262626;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .logout-button:hover {
            background-color: #ffb398;
            color: white;
        }

        .dashboard-container {
            display: flex;
            justify-content: space-around;
            padding: 30px;
        }

        .profile-section {
            width: 30%;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 20%;
            margin-bottom: 10px;
        }

        .stats {
            display: flex;
            justify-content: space-around;
        }

        .stat-card {
            background-color: #262626;
            color: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
        }

        .main-section {
            width: 60%;
        }

        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 45%;
            text-align: center;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #262626;
            color: #ffffff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <a href="logout.php" class="logout-button">Keluar</a>
        <h1>Manajemen Pegawai RR Beauty</h1>
    </header>
    
    <div class="dashboard-container">
        <div class="profile-section">
            <div class="profile-info">
                <img src="source/profil2.jpg" alt="Profile" class="profile-pic">
                <h2><?php echo htmlspecialchars($_SESSION['username']); ?></h2>
                <p>Administrator</p>
            </div>
            <div class="stats">
                <div class="stat-card">
                    <h3>Average Score</h3>
                    <div class="percentage" data-value="72.5">0%</div>
                </div>
                <div class="stat-card">
                    <h3>Attendance</h3>
                    <div class="percentage" data-value="80">0%</div>
                </div>
                <div class="stat-card">
                    <h3>Grades</h3>
                    <div class="percentage" data-value="90">0%</div>
                </div>
            </div>
        </div>

        <div class="main-section">
            <h1>Hallo! <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
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

    <footer>
        <p>&copy; RR Beauty 2024</p>
    </footer>

    <script>
        // Animasi persentase
        document.addEventListener("DOMContentLoaded", () => {
            const percentages = document.querySelectorAll('.percentage');
            percentages.forEach(el => {
                const target = parseFloat(el.dataset.value); // Ambil nilai target
                let count = 0; // Mulai dari 0
                const interval = setInterval(() => {
                    if (count <= target) {
                        el.textContent = `${count.toFixed(1)}%`;
                        count += 0.5; // Tambahkan dengan increment kecil
                    } else {
                        clearInterval(interval); // Hentikan animasi
                    }
                }, 20); // Durasi setiap update (20ms)
            });
        });
    </script>
</body>
</html>
