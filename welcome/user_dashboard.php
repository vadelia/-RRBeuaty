<?php
session_start();

// Cek apakah pengguna sudah login (pastikan sesi 'username' ada)
if (!isset($_SESSION['username'])) {
    // Jika tidak login, arahkan ke halaman login
    header("Location: login_page.php");
    exit();
}

// Cek apakah pengguna memiliki role yang sesuai
if ($_SESSION['role'] !== 'User') {
    // Jika bukan User, arahkan ke admin dashboard
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
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #e17055;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .user-info {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .user-info p {
            margin: 5px 0;
        }
        .menu {
            list-style: none;
            padding: 0;
        }
        .menu li {
            background-color: #e17055;
            color: white;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .menu li a {
            color: white;
            text-decoration: none;
        }
        .logout-btn {
            background-color: #e17055;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Welcome to User Dashboard, <?php echo $_SESSION['username']; ?>!</h2>

    <div class="user-info">
        <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
        <p><strong>Role:</strong> <?php echo $_SESSION['role']; ?></p>
    </div>

    <h3>Menu:</h3>
    <ul class="menu">
        <li><a href="profile.php">View Profile</a></li>
        <li><a href="order_history.php">Order History</a></li>
        <li><a href="settings.php">Account Settings</a></li>
        <!-- Tambahkan menu tambahan sesuai dengan fitur yang ada -->
    </ul>

    <a href="logout.php" class="logout-btn">Logout</a>
</div>
</body>
</html>
