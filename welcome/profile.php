<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #262626, #ffb398);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #e17055;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
        }
        a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: #e17055;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Your Profile</h2>
    <p><strong>Username:</strong> <?php echo $username; ?></p>
    <p><strong>Role:</strong> <?php echo $role; ?></p>
    <a href="user_dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>
