<?php
// Mulai sesi
session_start();
// Koneksi ke database
$host = 'localhost';
$dbname = 'uas_web'; // Nama database Anda
$user = 'root'; // Username database Anda
$pass = ''; // Password database Anda
$conn = new mysqli($host, $user, $pass, $dbname);
// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$error_message = '';

// Proses jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $role = isset($_POST['role']) ? trim($_POST['role']) : '';

    // Validasi input
    if (empty($username) || empty($password) || empty($role)) {
        $error_message = "Username, password, atau role tidak boleh kosong!";
    } else {
        // Periksa username dan role di database
        $sql = "SELECT * FROM login_page WHERE username = ? AND role = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Periksa password (gunakan hash untuk keamanan! Misalnya dengan password_verify)
            if ($password === $user['password']) {
                // Login berhasil
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role']; // Simpan role dalam sesi

                // Simpan "Ingat saya" ke dalam cookie jika dicentang
                if (isset($_POST['remember'])) {
                    setcookie('username', $user['username'], time() + (86400 * 30), "/");
                    setcookie('role', $user['role'], time() + (86400 * 30), "/");
                }

                // Redirect berdasarkan role
                if ($role === 'Admin') {
                    header("Location: dashboard.php");
                } else {
                    header("Location: user_dashboard.php");
                }
                exit();
            } else {
                $error_message = "Password salah!";
            }
        } else {
            $error_message = "Username atau role tidak ditemukan!";
        }
    }
}
// Menampilkan alert jika ada error message
if (!empty($error_message)) {
    echo "<script>alert('$error_message');</script>";
}
// Tutup koneksi
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login RR Beauty</title>
    <!-- Tambahkan font tambahan dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Global CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #262626, #ffb398);  
            color: #333;
        }

        .container {
            background-color: #ffb398;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 420px;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            font-family: 'Roboto Slab', serif;
            font-weight: 700; /* Menjadikan font lebih tebal */
            font-size: 36px; /* Besar font */
            text-align: center;
            color: #262626; /* Warna teks */
        }
        h2 img {
            max-width: 120px; /* Perbesar gambar logo */
            display: block;
            margin: 0 auto 10px;
        }

        /* Form dan Input */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #e17055;
            box-shadow: 0 0 5px rgba(225, 112, 85, 0.5);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #e17055;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        button:hover {
            background: #d15445;
            transform: scale(1.02);
            box-shadow: 0 4px 10px rgba(225, 112, 85, 0.3);
        }

        .links {
            text-align: center;
            margin-top: 15px;
        }

        .links a {
            color: #262626;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .remember-me input {
            margin: 0;
            width: 16px;
            height: 16px;
        }

        .remember-me label {
            margin: 0;
        }

        /* Link ke Home */
        .home-link {
            text-align: center;
            margin-top: 15px;
        }

        .home-link a {
            color: #e17055;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>
        <img src="source/rr_logo2.png" alt="RR Beauty Logo">
        Login to RR Beauty
    </h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
            <div class="form-group remember-me">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
        </div>
        <button type="submit">Login</button>
    </form>
    <div class="links">
        <a href="#">Forgot Password?</a> | 
        <a href="register.php">Create Account</a>
    </div>
    <div class="home-link">
        <a href="home_page.php">Kembali ke Home</a>
    </div>
</div>
</body>
</html>