<?php
session_start();

// Waktu timeout sesi dalam detik (misal: 5 menit)
$timeout_duration = 300;

// Periksa apakah ada waktu terakhir aktivitas dalam sesi
if (isset($_SESSION['last_activity'])) {
    $elapsed_time = time() - $_SESSION['last_activity'];
    
    if ($elapsed_time > $timeout_duration) {
        // Jika waktu habis, hapus sesi dan arahkan ke halaman login
        session_unset();
        session_destroy();
        header("Location: login_page.php?message=SessionExpired");
        exit();
    }
}

// Perbarui waktu aktivitas terakhir
$_SESSION['last_activity'] = time();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    exit();
}

// Cek role pengguna
if ($_SESSION['role'] !== 'User') {
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #262626, #ffb398);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }
        h2 {
            color: #e17055;
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #e17055;
            color: white;
        }
        .logout-btn {
            background-color: #e17055;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .session-warning {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>

    <h3>Order History</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Order ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dummy data, ganti dengan data dari database -->
            <tr>
                <td>1</td>
                <td>ORD12345</td>
                <td>Product A</td>
                <td>2</td>
                <td>$40</td>
                <td>2024-12-01</td>
            </tr>
            <tr>
                <td>2</td>
                <td>ORD67890</td>
                <td>Product B</td>
                <td>1</td>
                <td>$20</td>
                <td>2024-12-05</td>
            </tr>
            <!-- Tambahkan data lain -->
        </tbody>
    </table>

    <p class="session-warning">
        Sesi Anda akan berakhir pada <span id="session-timer">05:00</span> minutes.
    </p>

    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<script>
    // Hitung mundur waktu sesi
    let timeoutDuration = <?php echo $timeout_duration; ?>; // Waktu sesi dalam detik
    const timerElement = document.getElementById("session-timer");

    function updateTimer() {
        let minutes = Math.floor(timeoutDuration / 60);
        let seconds = timeoutDuration % 60;
        timerElement.textContent = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
        timeoutDuration--;

        if (timeoutDuration < 0) {
            alert("Sesi berakhir. Silakan masuk kembali.");
            window.location.href = "login_page.php?message=SessionExpired";
        }
    }

    setInterval(updateTimer, 1000);
</script>
</body>
</html>
